<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoCategory;
use App\Models\Video;

class AdminVideoCategoryController extends Controller
{
    public function index(){
        $categories = VideoCategory::all();
        return view('admin.video_category.index',compact(['categories']));
    }
    public function create(){
        return view('admin.video_category.create');
    }
    public function create_submit(Request $request){
        $request->validate([
            'name'=>['required','unique:video_categories']
        ]);
        $categories= new VideoCategory();
        $categories->name=$request->name;

        $categories->save();
        return redirect()->route('admin_video_category_index')->with('success','Video Categories is created Successfully');
    }
    public function edit($id){
        $category= VideoCategory::findOrFail($id);
        return view('admin.video_category.edit',compact('category'));
    }
    public function edit_submit(Request $request, $id){
        $request->validate([
            'name'=>['required','unique:video_categories,name,'.$id]
        ]);
        $categories=VideoCategory::findOrFail($id);

        $categories->name=$request->name;
        $categories->update();
        return redirect()->route('admin_video_category_index')->with('success','video Categories is updated Successfully');
    }
    
    public function delete($id)
    {
        $videos=Video::where('video_category_id',$id)->delete();
        VideoCategory::findOrFail($id)->delete();

        return redirect()->route('admin_video_category_index')->with('success','Video Category is Deleted Successfully');
    }
}
