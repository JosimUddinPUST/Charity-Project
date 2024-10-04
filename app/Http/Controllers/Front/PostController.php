<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;
use Carbon\Carbon;
use App\Models\Comment;

class PostController extends Controller
{
    public function index(){
        $posts=Post::with('post_categories')->paginate(15);
        return view('front.blog',compact('posts'));
    }
    public function detail($slug){
        $post= Post::where('slug',$slug)->first();
        $latest_posts=Post::orderBy('id','desc')->limit(5)->get();
        $latest_post_categories=PostCategory::orderBy('name','asc')->get();
        $post_date= Carbon::parse($post->created_at)->format('j F, Y');
        $tags=Post::pluck('tags')->flatMap(function ($item){
            return explode(',',$item);
        })->unique()->values()->all();
        return view('front.post',compact('post','latest_posts','latest_post_categories','post_date','tags'));
    }
    public function comment_submit(Request $request){
        $request->validate([
            'comment'=>'required',
            'name'=>'required',
            'email'=>'required|email',
        ]);
        $comment=new Comment();
        $comment->post_id=$request->post_id;
        $comment->comment=$request->comment;
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->status=0;
        $comment->save();
        
        return redirect()->back()->with('success','Commment submitted Successfully');
    

    }
}
