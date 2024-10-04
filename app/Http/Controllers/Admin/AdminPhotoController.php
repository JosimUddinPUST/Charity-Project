<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\PhotoCategory;

class AdminPhotoController extends Controller
{
    public function index(){
        $photos = Photo::with('photo_categories')->get();
        return view('admin.photo.index',compact(['photos']));
    }
    public function create(){
        $photo_categories = PhotoCategory::get();
        return view('admin.photo.create', compact('photo_categories'));
    }
    public function create_submit(Request $request){
        $request->validate([
            'photo'=>'required|image|mimes:jpg,jpeg,png'
        ]);
        $photo= new photo();
        $photo->photo_category_id=$request->photo_category_id;

        $final_name = 'category_photo_'.time().'.'.$request->photo->extension();

        $request->photo->move(public_path('uploads'), $final_name);

        $photo->photo=$final_name;
        $photo->save();
        return redirect()->route('admin_photo_index')->with('success','Photo is created Successfully');
    }
    public function edit($id){
        $photo= Photo::findOrFail($id);
        $photo_categories = PhotoCategory::get();
        return view('admin.photo.edit',compact('photo','photo_categories'));
    }
    public function edit_submit(Request $request, $id){

        $photo=Photo::findOrFail($id);

        if($request->photo != null) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png',
            ]);

            $filePath = public_path('uploads/'.$photo->photo);
            if (file_exists($filePath) && !is_dir($filePath)) {
                unlink($filePath);
            }

            $final_name = 'photo_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $photo->photo = $final_name;
        }
        $photo->photo_category_id=$request->photo_category_id;
        $photo->update();
        return redirect()->route('admin_photo_index')->with('success','Photo is updated Successfully');
    }
    public function delete($id)
    {
        $photo=Photo::findOrFail($id);
        if($photo->photo){
            $filePath = public_path('uploads/' . $photo->photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $photo->delete();
        return redirect()->route('admin_photo_index')->with('success','Photo is Deleted Successfully');
    }
}
