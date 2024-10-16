<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventPhoto;
use App\Models\EventVideo;

class AdminEventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('admin.event.index',compact(['events']));
    }
    public function create(){
        return view('admin.event.create');
    }
    public function create_submit(Request $request){
        $request->validate([
            'name'=>['required','unique:events'],
            'slug'=>['required','alpha_dash','unique:events'],
            'location'=>'required',
            'price'=>['required','min:0'],
            'date'=>'required',
            'time'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'featured_photo'=>'required|image|mimes:jpg,jpeg,png'
        ]);
        if($request->total_seat != ''){
            $request->validate([
            'total_seat'=>['numeric','min:1'],
        ]);
        }
        $event= new Event();
        $event->name=$request->name;
        $event->slug=$request->slug;
        $event->location=$request->location;
        $event->price=$request->price;
        $event->date=$request->date;
        $event->time=$request->time;
        $event->short_description=$request->short_description;
        $event->description=$request->description;
        $event->total_seat=$request->total_seat;
        $event->booked_seat=$request->booked_seat;
        $event->map=$request->map;

        $final_name = 'event_'.time().'.'.$request->featured_photo->extension();

        $request->featured_photo->move(public_path('uploads'), $final_name);

        $event->featured_photo=$final_name;
        $event->save();
        return redirect()->route('admin_event_index')->with('success','Event is created Successfully');
    }
    public function edit($id){
        $event= Event::findOrFail($id);
        return view('admin.event.edit',compact('event'));
    }
    public function edit_submit(Request $request, $id){
        $request->validate([
            'name'=>['required','unique:events,name,'.$id],
            'slug'=>['required','alpha_dash','unique:events,slug,'.$id],
            'location'=>'required',
            'price'=>['required','min:0'],
            'date'=>'required',
            'time'=>'required',
            'short_description'=>'required',
            'description'=>'required',
        ]);
        if($request->total_seat != ''){
            $request->validate([
            'total_seat'=>['numeric','min:1'],
        ]);
        }
        
        $event= Event::findOrFail($id);
        $event->name=$request->name;
        $event->slug=$request->slug;
        $event->location=$request->location;
        $event->price=$request->price;
        $event->date=$request->date;
        $event->time=$request->time;
        $event->short_description=$request->short_description;
        $event->description=$request->description;
        $event->total_seat=$request->total_seat;
        $event->booked_seat=$request->booked_seat;
        $event->map=$request->map;

        if($request->featured_photo != null) {
            $request->validate([
                'featured_photo' => 'image|mimes:jpg,jpeg,png',
            ]);

            $filePath = public_path('uploads/'.$event->featured_photo);
            if (file_exists($filePath) && !is_dir($filePath)) {
                unlink($filePath);
            }

            $final_name = 'event_'.time().'.'.$request->featured_photo->extension();
            $request->featured_photo->move(public_path('uploads'), $final_name);
            $event->featured_photo = $final_name;
        }
        $event->update();
        return redirect()->route('admin_event_index')->with('success','Event is updated Successfully');
    }
    public function delete($id)
    {
        $event=Event::findOrFail($id);
        if($event->featured_photo){
            $filePath = public_path('uploads/' . $event->featured_photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $event->delete();
        return redirect()->route('admin_event_index')->with('success','Event is Deleted Successfully');
    }
    public function photo($id){
        $single_event=Event::findOrFail($id);
        $event_photos= EventPhoto::where('event_id',$id)->get();
        return view('admin.event.photo',compact('single_event','event_photos'));
    }

    public function photo_submit(Request $request){
        $request->validate([
            'event_id'=>'required',
            'photo'=>'required |image|mimes:jpg,jpeg,png',
        ]);
        $event_photo=new EventPhoto();
        $event_photo->event_id= $request->event_id;
        $final_name = 'event_photo_'.time().'.'.$request->photo->extension();

        $request->photo->move(public_path('uploads'), $final_name);

        $event_photo->photo=$final_name;
        $event_photo->save();
        return redirect()->back()->with('success','Event Photo is created Successfully');
    }

    public function photo_delete($id){
        $event_photo=EventPhoto::findOrFail($id);

        if($event_photo->photo){
            $filePath = public_path('uploads/' . $event_photo->photo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $event_photo->delete();
        return redirect()->back()->with('success','Event Photo is Deleted Successfully');
    }

    
    public function video($id){
        $single_event=Event::findOrFail($id);
        $event_videos= EventVideo::where('event_id',$id)->get();
        return view('admin.event.video',compact('single_event','event_videos'));
    }

    public function video_submit(Request $request){
        $request->validate([
            'event_id'=>'required',
            'video'=>'required',
        ]);
        $event_video=new EventVideo();
        $event_video->event_id= $request->event_id;
        $event_video->video=$request->video;
        $event_video->save();
        return redirect()->back()->with('success','Event video is created Successfully');
    }

    public function video_delete($id){
        $event_video=EventVideo::findOrFail($id);
        $event_video->delete();
        return redirect()->back()->with('success','Event Video is Deleted Successfully');
    }
}
