<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminSpecialController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
use App\Models\Special;
use App\Models\Feature;
use App\Models\FeatureSectionItem;
use App\Models\Testimonial;
use App\Models\TestimonialSectionItem;
use App\Models\Cause;
use App\Models\Event;
use App\Models\Post;
use App\Models\HomePageItem;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::get();
        $features = Feature::get();
        $single_item=FeatureSectionItem::where('id',1)->first();
        $special= Special::where('id',1)->first();
        $testimonial_section_item=TestimonialSectionItem::where('id',1)->first();
        $testimonials= Testimonial::get();
        
        $home_page_item = HomePageItem::where('id',1)->first();
        $featured_causes = Cause::where('is_featured','Yes')->get();
        $events = Event::take(3)->get();
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
        
        // $posts=Post::with('post_categories')->paginate(15);

        return view('front.home', compact('sliders', 'special', 'features', 'single_item','testimonials', 'home_page_item', 'testimonial_section_item','featured_causes', 'events', 'posts'));
    }
}
