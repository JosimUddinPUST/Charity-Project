<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Comment;

class AdminPostController extends Controller
{
    public function index(){
        $posts = Post::with('post_categories')->get();
        return view('admin.post.index',compact(['posts']));
    }
    public function create(){
        $post_categories = PostCategory::get();
        return view('admin.post.create', compact('post_categories'));
    }
    public function create_submit(Request $request){
        $request->validate([
            'photo'=>'required|image|mimes:jpg,jpeg,png',
            'title'=>'required | unique:posts',
            'slug'=>'required| alpha_dash| unique:posts',
            'short_description'=>'required',
            'description'=>'required',
        ]);
        if($request->tags== null)
        {
            $tags='';
        }
        else{
            $tags=implode(',',$request->tags);
        }

        $post= new Post();
        $post->post_category_id=$request->post_category_id;
        $post->title=$request->title;
        $post->short_description=$request->short_description;
        $post->description=$request->description;
        $post->slug=strtolower($request->slug);
        $post->tags=$tags;

        $final_name = 'post_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $post->photo=$final_name;
        $post->save();

        return redirect()->route('admin_post_index')->with('success','Post is created Successfully');
    }
    public function edit($id){
        $post= Post::findOrFail($id);
        $post_categories = PostCategory::get();
        $post_tags= explode(',',$post->tags);
        return view('admin.post.edit',compact('post','post_categories','post_tags'));
    }
    public function edit_submit(Request $request, $id){

        $request->validate([
            'title'=>['required', 'unique:posts,title,'.$id],
            'slug'=>['required','alpha_dash', 'unique:posts,slug,'.$id],
            'short_description'=>'required',
            'description'=>'required',
        ]);
        if($request->tags== null)
        {
            $tags='';
        }
        else{
            $tags=implode(',',$request->tags);
        }

        $post=Post::findOrFail($id);

        if($request->photo != null) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png',
            ]);

            $filePath = public_path('uploads/'.$post->photo);
            if (file_exists($filePath) && !is_dir($filePath)) {
                unlink($filePath);
            }
            $final_name = 'post_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $post->photo = $final_name;
        }
        $post->post_category_id=$request->post_category_id;
        $post->title=$request->title;
        $post->slug=strtolower($request->slug);
        $post->short_description=$request->short_description;
        $post->description=$request->description;
        $post->tags=$tags;
        $post->update();
        return redirect()->route('admin_post_index')->with('success','Post is updated Successfully');
    }
    public function delete($id)
    {
        $post=Post::findOrFail($id);
        if($post->photo){
            $filePath = public_path('uploads/' . $post->photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $post->delete();
        return redirect()->route('admin_post_index')->with('success','Post is Deleted Successfully');
    }
    public function comment(){
        $comments=Comment::get();
        return view('admin.post.comment',compact('comments'));
    }
    public function comment_delete($id)
    {
        $comment=Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('admin_comments')->with('success','Comment is Deleted Successfully');
    }
    public function status_change($id)
    {
        $comment=Comment::findOrFail($id);
        if($comment->status=='pending')
        {
            $comment->status='active';
        }
        else{
            $comment->status='pending';
        }
        $comment->update();
        return redirect()->route('admin_comments')->with('success','Comment Status is changed Successfully');
    }
}
