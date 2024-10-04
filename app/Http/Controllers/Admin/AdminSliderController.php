<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class AdminSliderController extends Controller
{
    public function index(){
        $sliders= Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
    public function create(){
        // $sliders= Slider::all();
        return view('admin.slider.create');
    }
    public function create_submit(Request $request){
        $request->validate([
            'heading'=>'required',
            'text'=>'required',
            'photo'=>'required|image|mimes:jpg,jpeg,png'
        ]);
        $slider= new Slider();
        $slider->heading=$request->heading;
        $slider->text=$request->text;
        $slider->button_text=$request->button_text;
        $slider->button_link=$request->button_link;

        $final_name = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('uploads'), $final_name);

        $slider->photo=$final_name;
        $slider->save();
        return redirect()->back()->with('success','Slider created Successfully');
    }
    public function edit($id){
        $slider= Slider::findOrFail($id);

        return view('admin.slider.edit',compact('slider'));
    }
    public function edit_submit(Request $request, $id){
        $request->validate([
            'heading'=>'required',
            'text'=>'required',
        ]);
        $slider=Slider::findOrFail($id);

        if($request->photo != null) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png',
            ]);
            
            $filePath = public_path('uploads/'.$slider->photo);
            if (file_exists($filePath) && !is_dir($filePath)) {
                unlink($filePath);
            }

            $final_name = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $slider->photo = $final_name;
        }
        

        $slider->heading=$request->heading;
        $slider->text=$request->text;
        $slider->button_text=$request->button_text;
        $slider->button_link=$request->button_link;

        $slider->update();
        return redirect()->back()->with('success','Slider updated Successfully');
    }
    public function delete($id)
    {
        $slider=Slider::findOrFail($id);
        if($slider->photo){
            $filePath = public_path('uploads/' . $slider->photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $slider->delete();
        return redirect()->back()->with('success','Slider Deleted Successfully');
    }
}
