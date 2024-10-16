<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use App\Models\Post;

class AdminPostCategoryController extends Controller
{
    public function index(){
        $categories = PostCategory::all();
        return view('admin.post_category.index',compact(['categories']));
    }
    public function create(){
        return view('admin.post_category.create');
    }
    public function create_submit(Request $request){
        $request->validate([
            'name'=>['required','unique:post_categories']
        ]);
        $categories= new PostCategory();
        $categories->name=$request->name;

        $categories->save();
        return redirect()->route('admin_post_category_index')->with('success','Categories is created Successfully');
    }
    public function edit($id){
        $category= PostCategory::findOrFail($id);
        return view('admin.post_category.edit',compact('category'));
    }
    public function edit_submit(Request $request, $id){
        $request->validate([
            'name'=>['required','unique:post_categories,name,'.$id]
        ]);
        $categories=PostCategory::findOrFail($id);

        $categories->name=$request->name;
        $categories->update();
        return redirect()->route('admin_post_category_index')->with('success','Post Categories is updated Successfully');
    }
    
    public function delete($id)
    {
        $posts=Post::where('post_category_id',$id)->get();
        foreach($posts as $post){
            unlink(public_path('uploads/'.$post->photo));
            $post->delete();
        }
        PostCategory::findOrFail($id)->delete();
        return redirect()->route('admin_post_category_index')->with('success','Post Category is Deleted Successfully');
    }
}
