<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_dashboard') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('admin/slider/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_slider_index') }}"><i class="fas fa-hand-point-right"></i> <span>Sliders</span></a></li>
            
            <li class="{{ Request::is('admin/special/*')? 'active': '' }}"><a class="nav-link" href="{{ route('admin_special_edit') }}"><i class="fas fa-hand-point-right"></i><span>Specials</span></a></li>

            <li class="{{ Request::is('admin/feature/*')? 'active': '' }}"><a class="nav-link" href="{{ route('admin_feature_index') }}"><i class="fas fa-hand-point-right"></i><span>Features</span></a></li>

            <li class="{{ Request::is('admin/testimonial/*')? 'active': '' }}"><a class="nav-link" href="{{ route('admin_testimonial_index') }}"><i class="fas fa-hand-point-right"></i><span>Testimonials</span></a></li>
            
            <li class="{{ Request::is('admin/counter/*')? 'active': '' }}"><a class="nav-link" href="{{ route('admin_counter_edit') }}"><i class="fas fa-hand-point-right"></i><span>Counters</span></a></li>
            
            <li class="{{ Request::is('admin/faq/*')? 'active': '' }}"><a class="nav-link" href="{{ route('admin_faq_index') }}"><i class="fas fa-hand-point-right"></i><span>FAQs</span></a></li>

            <li class="{{ Request::is('admin/volunteer/*')? 'active': '' }}"><a class="nav-link" href="{{ route('admin_volunteer_index') }}"><i class="fas fa-hand-point-right"></i><span>Volunteer</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/photo/*') ||Request::is('admin/photo-category/*')? 'active': '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Photo Gallery</span></a>
                <ul class="dropdown-menu">
                    <li class="{{  Request::is('admin/photo-category/*')? 'active': '' }}"> <a class="nav-link" href="{{route('admin_photo_category_index')}}"> <i class="fas fa-angle-right"></i>Categories</a> </li>
                    
                    <li class="{{ Request::is('admin/photo/*')? 'active': '' }}"> <a class="nav-link" href= "{{ route('admin_photo_index') }}"> <i class="fas fa-angle-right"></i>Photos</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{Request::is('admin/video/*') || Request::is('admin/video-category/*')? 'active': '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Video Gallery</span></a>
                <ul class="dropdown-menu">
                    <li class="{{  Request::is('admin/video-category/*')? 'active': '' }}"> <a class="nav-link" href="{{route('admin_video_category_index')}}"> <i class="fas fa-angle-right"></i>Categories</a> </li>
                    <li class="{{ Request::is('admin/video/*')? 'active': '' }}"> <a class="nav-link" href= "{{ route('admin_video_index') }}"> <i class="fas fa-angle-right"></i>Videos</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/comments') || Request::is('admin/post-category/*') ||Request::is('admin/post/*') ? 'active': '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Post Gallery</span></a>
                <ul class="dropdown-menu">
                    <li class="{{  Request::is('admin/post-category/*')? 'active': '' }}"> <a class="nav-link" href="{{route('admin_post_category_index')}}"> <i class="fas fa-angle-right"></i>Categories</a> </li>
                    
                    <li class="{{ Request::is('admin/post/*')? 'active': '' }}"> <a class="nav-link" href= "{{ route('admin_post_index') }}"> <i class="fas fa-angle-right"></i>Posts</a></li>
                    
                    <li class="{{ Request::is('admin/comments')? 'active': '' }}"> <a class="nav-link" href= "{{ route('admin_comments') }}"> <i class="fas fa-angle-right"></i>Comments</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/event/*')? 'active': '' }}"><a class="nav-link" href="{{ route('admin_event_index') }}"><i class="fas fa-hand-point-right"></i><span>Events</span></a></li>

            <li class="{{ Request::is('admin/cause/*')? 'active': '' }}"><a class="nav-link" href="{{ route('admin_cause_index') }}"><i class="fas fa-hand-point-right"></i><span>Causes</span></a></li>
            

    
        {{-- <li class=""><a class="nav-link" href="setting.html"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>

            <li class=""><a class="nav-link" href="form.html"><i class="fas fa-hand-point-right"></i> <span>Form</span></a></li>

            <li class=""><a class="nav-link" href="table.html"><i class="fas fa-hand-point-right"></i> <span>Table</span></a></li>

            <li class=""><a class="nav-link" href="invoice.html"><i class="fas fa-hand-point-right"></i> <span>Invoice</span></a></li> --}}

        </ul>
    </aside>
</div>