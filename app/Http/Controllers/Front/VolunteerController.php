<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Volunteer;

class VolunteerController extends Controller
{
    public function index(){
        $volunteers= Volunteer::paginate(12);
        return view('front.volunteers',compact('volunteers'));
    }
    public function single_volunteer($id){
        // $volunteer= Volunteer::where('id',$id)->first(); 
        $volunteer= Volunteer::findOrFail($id);
        return view('front.volunteer',compact('volunteer'));
    }
}
