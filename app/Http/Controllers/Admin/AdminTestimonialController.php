<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\TestimonialSectionItem;

class AdminTestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::all();
        $testimonial_section_items=TestimonialSectionItem::where('id',1)->first();
        return view('admin.testimonial.index',compact(['testimonials','testimonial_section_items']));
    }
    public function create(){
        return view('admin.testimonial.create');
    }
    public function create_submit(Request $request){
        $request->validate([
            'name'=>'required',
            'designation'=>'required',
            'comment'=>'required',
            'photo'=>'required|image|mimes:jpg,jpeg,png'
        ]);
        $testimonial= new Testimonial();
        $testimonial->name=$request->name;
        $testimonial->designation=$request->designation;
        $testimonial->comment=$request->comment;

        $final_name = 'testimonial_'.time().'.'.$request->photo->extension();

        $request->photo->move(public_path('uploads'), $final_name);

        $testimonial->photo=$final_name;
        $testimonial->save();
        return redirect()->route('admin_testimonial_index')->with('success','Testimonial is created Successfully');
    }
    public function edit($id){
        $testimonial= Testimonial::findOrFail($id);
        return view('admin.testimonial.edit',compact('testimonial'));
    }
    public function edit_submit(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'designation'=>'required',
            'comment'=>'required',
        ]);
        $testimonial=Testimonial::findOrFail($id);

        if($request->photo != null) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png',
            ]);

            $filePath = public_path('uploads/'.$testimonial->photo);
            if (file_exists($filePath) && !is_dir($filePath)) {
                unlink($filePath);
            }

            $final_name = 'testimonial_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $testimonial->photo = $final_name;
        }

        $testimonial->name=$request->name;
        $testimonial->designation=$request->designation;
        $testimonial->comment=$request->comment;

        $testimonial->update();
        return redirect()->route('admin_testimonial_index')->with('success','Testimonial is updated Successfully');
    }
    public function delete($id)
    {
        $testimonial=Testimonial::findOrFail($id);
        if($testimonial->photo){
            $filePath = public_path('uploads/' . $testimonial->photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $testimonial->delete();
        return redirect()->route('admin_testimonial_index')->with('success','Testimonial is Deleted Successfully');
    }
    
    public function section_update(Request $request){
        
        $testimonial=TestimonialSectionItem::where('id',1)->first();

        if($request->photo != null) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png',
            ]);
            $filePath = public_path('uploads/'.$testimonial->photo);
            if (file_exists($filePath) && !is_dir($filePath)) {
                unlink($filePath);
            }
            $final_name = 'testimonial_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $testimonial->photo = $final_name;
        }
        $testimonial->heading=$request->heading;
        $testimonial->status=$request->status;
        $testimonial->update();
        return redirect()->back()->with('success','Testimonial Sections Items are updated Successfully');
    }
    
}
