<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\VolunteerController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\EventController;
use App\Http\Controllers\Front\CauseController;

use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminSpecialController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminCounterController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminVolunteerController;
use App\Http\Controllers\Admin\AdminPhotoCategoryController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoCategoryController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminPostCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminCauseController;

require __DIR__.'/auth.php';

/* Front */
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/faq',[FaqController::class,'index'])->name('faq');
Route::get('/volunteers',[VolunteerController::class,'index'])->name('volunteers');
Route::get('/volunteer/{id}',[VolunteerController::class,'single_volunteer'])->name('single_volunteer');
Route::get('/photo-gallery',[PhotoController::class,'index'])->name('photo_gallery');
Route::get('/video-gallery',[VideoController::class,'index'])->name('video_gallery');
Route::get('/blog',[PostController::class,'index'])->name('blog');
Route::get('/post/{slug}',[PostController::class,'detail'])->name('post');
Route::post('/comment-submit',[PostController::class,'comment_submit'])->name('comment_submit');
Route::get('/events',[EventController::class,'index'])->name('events');
Route::get('/event/{slug}',[EventController::class,'detail'])->name('event');
Route::post('/event/send_message/',[EventController::class,'send_message'])->name('event_send_message');

Route::post('/event/ticket/payment', [EventController::class, 'payment'])->name('event_ticket_payment');
Route::get('/event/ticket/cancel', [EventController::class, 'cancel'])->name('event_ticket_cancel');
Route::get('/event/ticket/stripe-success', [EventController::class, 'stripe_success'])->name('event_ticket_stripe_success');
Route::post('/event/ticket/free-booking', [EventController::class, 'free_booking'])->name('event_ticket_free_booking');

Route::get('/causes', [CauseController::class, 'index'])->name('causes');
Route::get('/cause/{slug}', [CauseController::class, 'detail'])->name('cause');
Route::post('/cause/send-message', [CauseController::class, 'send_message'])->name('cause_send_message');


Route::post('/donation/payment', [CauseController::class, 'payment'])->name('donation_payment');
Route::get('/donation/cancel', [CauseController::class, 'cancel'])->name('donation_cancel');
Route::get('/donation/stripe-success', [CauseController::class, 'stripe_success'])->name('donation_stripe_success');


/* User */
Route::middleware('auth' ,'verified')->prefix('user')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('user_login');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user_dashboard');
    Route::get('/edit-profile', [UserController::class, 'profile'])->name('user_profile');
    Route::post('/profile-submit', [UserController::class, 'profile_submit'])->name('user_profile_submit');
    Route::post('/logout',[UserController::class,'logout'])->name('user_logout');

    Route::get('/event/tickets', [UserController::class, 'tickets'])->name('user_event_tickets');
    Route::get('/event/ticket/invoice/{id}', [UserController::class, 'ticket_invoice'])->name('user_event_ticket_invoice');

    Route::get('/cause/donations', [UserController::class, 'donations'])->name('user_cause_donations');
    Route::get('/cause/donation/invoice/{id}', [UserController::class, 'donation_invoice'])->name('user_cause_donation_invoice');


});


/* Admin */
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/edit-profile', [AdminController::class, 'edit_profile'])->name('admin_edit_profile');
    Route::post('/edit-profile-submit', [AdminController::class, 'edit_profile_submit'])->name('admin_edit_profile_submit');
    
    Route::get('/slider/index', [AdminSliderController::class, 'index'])->name('admin_slider_index');
    Route::post('/slider/create/submit', [AdminSliderController::class, 'create_submit'])->name('admin_slider_create_submit');
    Route::get('/slider/create', [AdminSliderController::class, 'create'])->name('admin_slider_create');
    Route::get('/slider/edit/{id}', [AdminSliderController::class, 'edit'])->name('admin_slider_edit');
    Route::post('/slider/edit/submit/{id}', [AdminSliderController::class, 'edit_submit'])->name('admin_slider_edit_submit');
    Route::get('/slider/delete/{id}', [AdminSliderController::class, 'delete'])->name('admin_slider_delete');
    
    Route::get('/special/edit',[AdminSpecialController::class,'edit'])->name('admin_special_edit');
    Route::post('/special/edit/submit',[AdminSpecialController::class,'submit'])->name('admin_special_edit_submit');

    Route::get('/feature/index', [AdminFeatureController::class, 'index'])->name('admin_feature_index');
    Route::get('/feature/create', [AdminFeatureController::class, 'create'])->name('admin_feature_create');
    Route::post('/feature/create/submit', [AdminFeatureController::class, 'create_submit'])->name('admin_feature_create_submit');
    Route::get('/feature/edit/{id}', [AdminFeatureController::class, 'edit'])->name('admin_feature_edit');
    Route::post('/feature/edit/submit/{id}', [AdminFeatureController::class, 'edit_submit'])->name('admin_feature_edit_submit');
    Route::get('/feature/delete/{id}', [AdminFeatureController::class, 'delete'])->name('admin_feature_delete');

    Route::post('/feature/section-update', [AdminFeatureController::class, 'section_update'])->name('admin_feature_section_update');

    Route::get('/testimonial/index', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_index');
    Route::get('/testimonial/create', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create');
    Route::post('/testimonial/create/submit', [AdminTestimonialController::class, 'create_submit'])->name('admin_testimonial_create_submit');
    Route::get('/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('/testimonial/edit/submit/{id}', [AdminTestimonialController::class, 'edit_submit'])->name('admin_testimonial_edit_submit');
    Route::get('/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');
    Route::post('/testimonial/section-update', [AdminTestimonialController::class, 'section_update'])->name('admin_testimonial_section_update');
    
    Route::get('/counter/edit',[AdminCounterController::class,'edit'])->name('admin_counter_edit');
    Route::post('/counter/edit/submit',[AdminCounterController::class,'submit'])->name('admin_counter_edit_submit');

    Route::get('/faq/index', [AdminFaqController::class, 'index'])->name('admin_faq_index');
    Route::get('/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
    Route::post('/faq/create/submit', [AdminFaqController::class, 'create_submit'])->name('admin_faq_create_submit');
    Route::get('/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('/faq/edit/submit/{id}', [AdminFaqController::class, 'edit_submit'])->name('admin_faq_edit_submit');
    Route::get('/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');
    Route::post('/faq/section-update', [AdminFaqController::class, 'section_update'])->name('admin_faq_section_update');
    
    Route::get('/volunteer/index', [AdminVolunteerController::class, 'index'])->name('admin_volunteer_index');
    Route::get('/volunteer/create', [AdminVolunteerController::class, 'create'])->name('admin_volunteer_create');
    Route::post('/volunteer/create/submit', [AdminVolunteerController::class, 'create_submit'])->name('admin_volunteer_create_submit');
    Route::get('/volunteer/edit/{id}', [AdminVolunteerController::class, 'edit'])->name('admin_volunteer_edit');
    Route::post('/volunteer/edit/submit/{id}', [AdminVolunteerController::class, 'edit_submit'])->name('admin_volunteer_edit_submit');
    Route::get('/volunteer/delete/{id}', [AdminVolunteerController::class, 'delete'])->name('admin_volunteer_delete');
    Route::post('/volunteer/section-update', [AdminVolunteerController::class, 'section_update'])->name('admin_volunteer_section_update');
    
    Route::get('/photo-category/index', [AdminPhotoCategoryController::class, 'index'])->name('admin_photo_category_index');
    Route::get('/photo-category/create', [AdminPhotoCategoryController::class, 'create'])->name('admin_photo_category_create');
    Route::post('/photo-category/create/submit', [AdminPhotoCategoryController::class, 'create_submit'])->name('admin_photo_category_create_submit');
    Route::get('/photo-category/edit/{id}', [AdminPhotoCategoryController::class, 'edit'])->name('admin_photo_category_edit');
    Route::post('/photo-category/edit/submit/{id}', [AdminPhotoCategoryController::class, 'edit_submit'])->name('admin_photo_category_edit_submit');
    Route::get('/photo-category/delete/{id}', [AdminPhotoCategoryController::class, 'delete'])->name('admin_photo_category_delete');
    Route::post('/photo-category/section-update', [AdminPhotoCategoryController::class, 'section_update'])->name('admin_photo_category_section_update');
    
    Route::get('/photo/index', [AdminPhotoController::class, 'index'])->name('admin_photo_index');
    Route::post('/photo/create/submit', [AdminPhotoController::class, 'create_submit'])->name('admin_photo_create_submit');
    Route::get('/photo/create', [AdminPhotoController::class, 'create'])->name('admin_photo_create');
    Route::get('/photo/edit/{id}', [AdminPhotoController::class, 'edit'])->name('admin_photo_edit');
    Route::post('/photo/edit/submit/{id}', [AdminPhotoController::class, 'edit_submit'])->name('admin_photo_edit_submit');
    Route::get('/photo/delete/{id}', [AdminPhotoController::class, 'delete'])->name('admin_photo_delete');

    Route::get('/video-category/index', [AdminVideoCategoryController::class, 'index'])->name('admin_video_category_index');
    Route::get('/video-category/create', [AdminVideoCategoryController::class, 'create'])->name('admin_video_category_create');
    Route::post('/video-category/create/submit', [AdminVideoCategoryController::class, 'create_submit'])->name('admin_video_category_create_submit');
    Route::get('/video-category/edit/{id}', [AdminVideoCategoryController::class, 'edit'])->name('admin_video_category_edit');
    Route::post('/video-category/edit/submit/{id}', [AdminVideoCategoryController::class, 'edit_submit'])->name('admin_video_category_edit_submit');
    Route::get('/video-category/delete/{id}', [AdminVideoCategoryController::class, 'delete'])->name('admin_video_category_delete');
    Route::post('/video-category/section-update', [AdminVideoCategoryController::class, 'section_update'])->name('admin_video_category_section_update');
    
    Route::get('/video/index', [AdminVideoController::class, 'index'])->name('admin_video_index');
    Route::post('/video/create/submit', [AdminVideoController::class, 'create_submit'])->name('admin_video_create_submit');
    Route::get('/video/create', [AdminVideoController::class, 'create'])->name('admin_video_create');
    Route::get('/video/edit/{id}', [AdminVideoController::class, 'edit'])->name('admin_video_edit');
    Route::post('/video/edit/submit/{id}', [AdminVideoController::class, 'edit_submit'])->name('admin_video_edit_submit');
    Route::get('/video/delete/{id}', [AdminVideoController::class, 'delete'])->name('admin_video_delete');
           
    Route::get('/post-category/index', [AdminPostCategoryController::class, 'index'])->name('admin_post_category_index');
    Route::get('/post-category/create', [AdminPostCategoryController::class, 'create'])->name('admin_post_category_create');
    Route::post('/post-category/create/submit', [AdminPostCategoryController::class, 'create_submit'])->name('admin_post_category_create_submit');
    Route::get('/post-category/edit/{id}', [AdminPostCategoryController::class, 'edit'])->name('admin_post_category_edit');
    Route::post('/post-category/edit/submit/{id}', [AdminPostCategoryController::class, 'edit_submit'])->name('admin_post_category_edit_submit');
    Route::get('/post-category/delete/{id}', [AdminPostCategoryController::class, 'delete'])->name('admin_post_category_delete');
    Route::post('/post-category/section-update', [AdminPostCategoryController::class, 'section_update'])->name('admin_post_category_section_update');

    Route::get('/post/index', [AdminPostController::class, 'index'])->name('admin_post_index');
    Route::post('/post/create/submit', [AdminPostController::class, 'create_submit'])->name('admin_post_create_submit');
    Route::get('/post/create', [AdminPostController::class, 'create'])->name('admin_post_create');
    Route::get('/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('/post/edit/submit/{id}', [AdminPostController::class, 'edit_submit'])->name('admin_post_edit_submit');
    Route::get('/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');
    Route::get('/comments', [AdminPostController::class, 'comment'])->name('admin_comments');
    Route::get('/comments/delete/{id}', [AdminPostController::class, 'comment_delete'])->name('admin_comment_delete');
    Route::get('/comments/status-change/{id}', [AdminPostController::class, 'status_change'])->name('admin_comment_status_change');

    Route::get('/event/index', [AdminEventController::class, 'index'])->name('admin_event_index');
    Route::post('/event/create/submit', [AdminEventController::class, 'create_submit'])->name('admin_event_create_submit');
    Route::get('/event/create', [AdminEventController::class, 'create'])->name('admin_event_create');
    Route::get('/event/edit/{id}', [AdminEventController::class, 'edit'])->name('admin_event_edit');
    Route::post('/event/edit/submit/{id}', [AdminEventController::class, 'edit_submit'])->name('admin_event_edit_submit');
    Route::get('/event/delete/{id}', [AdminEventController::class, 'delete'])->name('admin_event_delete');
    
    Route::get('/event/photo/{id}', [AdminEventController::class, 'photo'])->name('admin_event_photo');
    Route::post('/event/photo/submit', [AdminEventController::class, 'photo_submit'])->name('admin_event_photo_submit');
    Route::get('/event/photo/delete/{id}', [AdminEventController::class, 'photo_delete'])->name('admin_event_photo_delete');
    
    Route::get('/event/video/{id}', [AdminEventController::class, 'video'])->name('admin_event_video');
    Route::post('/event/video/submit', [AdminEventController::class, 'video_submit'])->name('admin_event_video_submit');
    Route::get('/event/video/delete/{id}', [AdminEventController::class, 'video_delete'])->name('admin_event_video_delete');

    Route::get('/cause/index', [AdminCauseController::class, 'index'])->name('admin_cause_index');
    Route::post('/cause/create/submit', [AdminCauseController::class, 'create_submit'])->name('admin_cause_create_submit');
    Route::get('/cause/create', [AdminCauseController::class, 'create'])->name('admin_cause_create');
    Route::get('/cause/edit/{id}', [AdminCauseController::class, 'edit'])->name('admin_cause_edit');
    Route::post('/cause/edit/submit/{id}', [AdminCauseController::class, 'edit_submit'])->name('admin_cause_edit_submit');
    Route::get('/cause/delete/{id}', [AdminCauseController::class, 'delete'])->name('admin_cause_delete');
    
    Route::get('/cause/photo/{id}', [AdminCauseController::class, 'photo'])->name('admin_cause_photo');
    Route::post('/cause/photo', [AdminCauseController::class, 'photo_submit'])->name('admin_cause_photo_submit');
    Route::get('/cause/photo/delete/{id}', [AdminCauseController::class, 'photo_delete'])->name('admin_cause_photo_delete');

    Route::get('/cause/video/{id}', [AdminCauseController::class, 'video'])->name('admin_cause_video');
    Route::post('/cause/video', [AdminCauseController::class, 'video_submit'])->name('admin_cause_video_submit');
    Route::get('/cause/video/delete/{id}', [AdminCauseController::class, 'video_delete'])->name('admin_cause_video_delete');

    Route::get('/cause/faq/{id}', [AdminCauseController::class, 'faq'])->name('admin_cause_faq');
    Route::post('/cause/faq', [AdminCauseController::class, 'faq_submit'])->name('admin_cause_faq_submit');
    Route::post('/cause/faq/update/{id}', [AdminCauseController::class, 'faq_update'])->name('admin_cause_faq_update');
    Route::get('/cause/faq/delete/{id}', [AdminCauseController::class, 'faq_delete'])->name('admin_cause_faq_delete');

    Route::get('/cause/donations/{id}', [AdminCauseController::class, 'donations'])->name('admin_cause_donations');
    Route::get('/cause/donation/invoice/{id}', [AdminCauseController::class, 'donation_invoice'])->name('admin_cause_donation_invoice');

});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin_login');
    Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin_logout');
    Route::get('/forget-password', [AdminController::class, 'forget_password'])->name('admin_forget_password');
    Route::post('/forget-password-submit', [AdminController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
    Route::get('/reset-password/{token}/{email}', [AdminController::class, 'reset_password'])->name('admin_reset_password');
    Route::post('/reset-password-submit', [AdminController::class, 'reset_password_submit'])->name('admin_reset_password_submit');
});

