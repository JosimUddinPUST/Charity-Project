@extends('front.layouts.app')

@section('main_content')
<div class="slider">
    <div class="slide-carousel owl-carousel">
        @foreach ($sliders as $slider)
            <div class="item" style="background-image:url('{{ asset('uploads/'.$slider->photo) }}');">
                <div class="bg"></div>
                <div class="text">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="text-wrapper">
                                    <div class="text-content">
                                        <h2>{{ $slider->heading }}</h2>
                                        <p>{!! $slider->text !!} </p>
                                        <div class="button-style-1 mt_20">
                                            <a href="{{ $slider->button_link}}">{{ $slider->button_text }} <i class="fas fa-long-arrow-alt-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@if($special->status=='show')
<div class="special pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full-section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left-side">
                                <div class="inner">
                                    <h2>{{ $special->sub_heading }}</h2>
                                    <h3>{{ $special->heading }}</h3>
                                    <p>{!! $special->text!!}</p>
                                    <div class="button-style-1 mt_20">
                                        <a href="{{ $special->button_link }}">{{ $special->button_text }} <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right-side" style="background-image: url('{{ asset('uploads/'.$special->photo) }}');">
                                <a class="video-button" href="https://www.youtube.com/watch?v={{ $special->video_id }}"><span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if($home_page_item->cause_status == 'Show')
<div class="cause pt_70">
    <div class="container">
        
        @if( $home_page_item->cause_heading != '' || $home_page_item->cause_subheading != '' )
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>{{ $home_page_item->cause_heading }}</h2>
                    <p>
                        {{ $home_page_item->cause_subheading }}
                    </p>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            @foreach($featured_causes as $item)
            <div class="col-lg-4 col-md-6">
                <div class="item pb_70">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h2>
                            <a href="{{ route('cause', $item->slug) }}">{{ $item->name }}</a>
                        </h2>
                        <div class="short-des">
                            <p>
                                {!! nl2br($item->short_description) !!}
                            </p>
                        </div>
                        @php
                            $perc = ($item->raised / $item->goal) * 100;
                            $perc = ceil($perc);
                        @endphp
                        <div class="progress mb_10">
                            <div class="progress-bar w-0" role="progressbar" aria-label="Example with label" aria-valuenow="{{ $perc }}" aria-valuemin="0" aria-valuemax="100" style="animation: progressAnimation{{ $loop->iteration }} 2s linear forwards;"></div>
                            <style>
                                @keyframes progressAnimation{{ $loop->iteration }} {
                                    from {
                                        width: 0;
                                    }
                                    to {
                                        width: {{ $perc }}%;
                                    }
                                }
                            </style>
                        </div>
                        <div class="lbl mb_20">
                            <div class="goal">Goal: ${{ $item->goal }}</div>
                            <div class="raised">Raised: ${{ $item->raised }}</div>
                        </div>
                        <div class="button-style-2">
                            <a href="{{ route('cause', $item->slug) }}">Donate Now <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@if($single_item->status=='show')
<div class="why-choose pt_70" style="background-image: url({{ asset('uploads/'.$single_item->photo) }})">
    <div class="container">
        <div class="row">
            @foreach($features as $feature)
                <div class="col-md-4">
                    <div class="inner pb_70">
                        <div class="icon">
                            <i class="{{ $feature->icon }}"></i>
                        </div>
                        <div class="text">
                            <h2>{{ $feature->heading }}</h2>
                            <p>
                                {!! $feature->text !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<div class="event pt_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Upcoming Events</h2>
                    <p>
                        You can organize events and help us to raise fund for the poor people.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($events as $event)
            <div class="col-lg-4 col-md-6">
                <div class="item pb_70">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$event->featured_photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h2>
                            <a href="{{ route('event',$event->slug) }}">{{ $event->name }}</a>
                        </h2>
                        <div class="date-time">
                            <i class="fas fa-calendar-alt"></i> 
                            @php
                             $date=\Carbon\Carbon::parse($event->date)->format('j M, Y'); 
                             $time=\Carbon\Carbon::parse($event->time)->format('h:i A'); 
                              
                            @endphp
                            Date: {{ $date }} , Time: {{ $time }}
                        </div>
                        <div class="short-des">
                            <p>
                                {!! $event->short_description !!}
                            </p>
                        </div>
                        <div class="button-style-2">
                            <a href="{{ route('event',$event->slug) }}">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@if($testimonial_section_item->status=='show')
<div class="testimonial pt_70 pb_70" style="background-image: url({{ asset('uploads/'.$testimonial_section_item->photo) }})">
    <div class="bg"></div>
    <div class="container">
        @if($testimonial_section_item->heading!='')
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">{{ $testimonial_section_item->heading }}</h2>
            </div>
        </div>
        @endif
        <div class="row">
            
            <div class="col-12">
                <div class="testimonial-carousel owl-carousel">
                    @foreach($testimonials as $testimonial)
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('uploads/'.$testimonial->photo) }}" alt="No Img" />
                        </div>
                        <div class="text">
                            <h4>{{ $testimonial->name }}</h4>
                            <p>{{ $testimonial->designation }}</p>
                        </div>
                        <div class="description">
                            <p>
                                {!! $testimonial->comment !!}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="blog pt_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Latest News</h2>
                    <p>
                        Check out the latest news and updates from our blog post
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6">
                <div class="item pb_70">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$post->photo) }}" alt="" />
                    </div>

                    <div class="text">
                        <h2>
                            <a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a>
                        </h2>
                        <div class="short-des">
                            <p>{!! $post->short_description !!}</p>
                        </div>
                        <div class="button-style-2 mt_20">
                            <a href="{{ route('post',$post->slug) }}">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection