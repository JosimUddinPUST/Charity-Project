<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoCategory;
use App\Models\Photo;

class AdminPhotoCategoryController extends Controller
{
    public function index(){
        $categories = PhotoCategory::all();
        return view('admin.photo_category.index',compact(['categories']));
    }
    public function create(){
        return view('admin.photo_category.create');
    }
    public function create_submit(Request $request){
        $request->validate([
            'name'=>['required','unique:photo_categories']
        ]);
        $categories= new PhotoCategory();
        $categories->name=$request->name;

        $categories->save();
        return redirect()->route('admin_photo_category_index')->with('success','Categories is created Successfully');
    }
    public function edit($id){
        $category= PhotoCategory::findOrFail($id);
        return view('admin.photo_category.edit',compact('category'));
    }
    public function edit_submit(Request $request, $id){
        $request->validate([
            'name'=>['required','unique:photo_categories,name,'.$id]
        ]);
        $categories=PhotoCategory::findOrFail($id);

        $categories->name=$request->name;
        $categories->update();
        return redirect()->route('admin_photo_category_index')->with('success','Photo Categories is updated Successfully');
    }
    
    public function delete($id)
    {
        $photos=Photo::where('photo_category_id',$id)->get();
        foreach($photos as $photo){
            unlink(public_path('uploads/'.$photo->photo));
            $photo->delete();
        }
        PhotoCategory::findOrFail($id)->delete();
        return redirect()->route('admin_photo_category_index')->with('success','Photo Category is Deleted Successfully');
    }
}
