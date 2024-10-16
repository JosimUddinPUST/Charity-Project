<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\FeatureSectionItem;

class AdminFeatureController extends Controller
{
    public function index(){
        $features = Feature::all();
        $feature_section_items= FeatureSectionItem::where('id',1)->first();
        return view('admin.feature.index',compact(['features','feature_section_items']));
    }
    public function create(){
        return view('admin.feature.create');
    }
    public function create_submit(Request $request){
        $request->validate([
            'heading'=>'required',
            'text'=>'required',
        ]);
        $feature= new Feature();
        $feature->heading=$request->heading;
        $feature->text=$request->text;
        $feature->icon=$request->icon;
        $feature->save();
        return redirect()->route('admin_feature_index')->with('success','Feature is created Successfully');
    }

    
    public function edit($id){
        $feature= Feature::findOrFail($id);
        return view('admin.feature.edit',compact('feature'));
    }
    public function edit_submit(Request $request, $id){
        $request->validate([
            'icon'=>'required',
            'heading'=>'required',
            'text'=>'required',
        ]);
        $feature=Feature::findOrFail($id);
        $feature->icon=$request->icon;
        $feature->heading=$request->heading;
        $feature->text=$request->text;
        $feature->update();
        return redirect()->route('admin_feature_index')->with('success','Feature is updated Successfully');
    }
    public function delete($id)
    {
        $feature=Feature::findOrFail($id);
        $feature->delete();
        return redirect()->back()->with('success','Feature is Deleted Successfully');
    }
    public function section_update(Request $request){
        
        $single_item=FeatureSectionItem::where('id',1)->first();

        if($request->photo != null) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png',
            ]);
            $filePath = public_path('uploads/'.$single_item->photo);
            if (file_exists($filePath) && !is_dir($filePath)) {
                unlink($filePath);
            }
            $final_name = 'feature_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $single_item->photo = $final_name;
        }
        $single_item->status=$request->status;
        $single_item->update();
        return redirect()->back()->with('success','Feature Sections Items are updated Successfully');
    }
}
