@extends('front.layouts.app')

@section('main_content')

<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $event->name }}</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('events') }}">Events</a></li>
                        <li class="breadcrumb-item active">{{ $event->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="event-detail pt_50 pb_50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="left-item">
                    <div class="main-photo">
                        <img src="{{ asset('uploads/'.$event->featured_photo) }}" alt="">
                    </div>
                    <h2>
                        Description
                    </h2>
                    <p>{!! $event->description !!}</p>
                </div>
                <div class="left-item">
                    <h2>
                        Photos
                    </h2>
                    <div class="photo-all">
                        <div class="row">
                            @foreach ($event_photos as $event_photo)
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a href="{{ asset('uploads/'.$event_photo->photo) }}" class="magnific">
                                        <img src="{{ asset('uploads/'.$event_photo->photo) }}" alt="No Img" />
                                        <div class="icon">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="left-item">
                    <h2>
                        Videos
                    </h2>
                    <div class="video-all">
                        <div class="row">
                            @foreach($event_videos as $event_video)
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a class="video-button" href="http://www.youtube.com/watch?v={{ $event_video->video }}">
                                        <img src="http://img.youtube.com/vi/{{ $event_video->video }}/0.jpg" alt="" />
                                        <div class="icon">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-12">

                <div class="right-item">

                    @php
                    $current_timestamp = strtotime(date('Y-m-d H:i'));
                    $event_timestamp = strtotime($event->date.' '.$event->time);
                    @endphp

                    @if($event_timestamp > $current_timestamp)
                    <div class="countdown show" data-Date='{{ $event->date }} {{ $event->time }}'>
                        <div class="boxes running">
                            <div class="box">
                                <div class="num"><timer><span class="days"></span></timer></div>
                                <div class="name">Days</div>
                            </div>
                            <div class="box">
                                <div class="num"><timer><span class="hours"></span></timer></div>
                                <div class="name">Hours</div>
                            </div>
                            <div class="box">
                                <div class="num"><timer><span class="minutes"></span></timer></div>
                                <div class="name">Minutes</div>
                            </div>
                            <div class="box">
                                <div class="num"><timer><span class="seconds"></span></timer></div>
                                <div class="name">Seconds</div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="text-danger"><h3>Event Date is Over!</h3></div>
                    @endif

                    <h2 class="mt_30">Event Information</h2>
                    <div class="summary">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                @if( $event->price!=0)
                                <tr>
                                    <td><b>Ticket Price</b></td>
                                    <td class="price">${{ $event->price }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td><b>Location</b></td>
                                    <td>{{ $event->location }}</td>
                                </tr>
                                <tr>
                                    <td><b>Date</b></td>
                                    <td>{{ $event->date }}</td>
                                </tr>
                                <tr>
                                    <td><b>Time</b></td>
                                    <td>{{ $event->time }}</td>
                                </tr>
                                @if($event->total_seat!=0)
                                    <tr>
                                        <td><b>Total Seat</b></td>
                                        <td>{{ $event->total_seat }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Booked</b></td>
                                        @if($event->booked_seat==0)
                                        <td>0</td>
                                        @else 
                                        <td>{{ $event->booked_seat }}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        @php
                                        $remaining=$event->total_seat-$event->booked_seat;
                                        @endphp
                                        <td><b>Remaining</b></td>
                                        <td>                                        
                                            {{ $remaining }}
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                    {{-- @if($event_timestamp > $current_timestamp)
                        @if($event->price!=0 && $remaining!=0)
                        <h2 class="mt_30">Buy Ticket</h2>
                        <div class="pay-sec">
                            <form action="{{ route('event_ticket_payment') }}" method="POST" >
                                @csrf
                                @csrf
                                <input type="hidden" name="unit_price" value="{{ $event->price }}">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <select name="number_of_tickets" class="form-select mb_15">
                                    <option value="">How many tickets?</option>
                                    @for($i=1; $i<=5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <select name="payment_method" class="form-select mb_15">
                                    <option value="">Select Payment Method</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="stripe">Stripe</option>
                                </select>
                                <button type="submit" class="btn btn-primary w-100-p pay-now">Make Payment</button>
                            </form>
                        </div>
                        @endif
                        @if($event->price==0 && $remaining!=0)
                        <h2 class="mt_30">Free Booking</h2>
                        <div class="pay-sec">
                            <form action="" method="POST" >
                                @csrf
                                <input type="hidden" name="unit_price" value="{{ $event->price }}">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <select name="number_of_tickets" class="form-select mb_15">
                                    @for($i=1; $i<=5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-primary w-100-p pay-now">Enroll Now</button>
                            </form>
                        </div>
                        @endif
                    @endif --}}

                    @if($event_timestamp > $current_timestamp)
                        @if($event->price != 0)
                        <h2 class="mt_30">Buy Ticket</h2>
                        <div class="pay-sec">
                            <form action="{{ route('event_ticket_payment') }}" method="post">
                                @csrf
                                <input type="hidden" name="unit_price" value="{{ $event->price }}">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <select name="number_of_tickets" class="form-select mb_15">
                                    <option value="">How many tickets?</option>
                                    @for($i=1; $i<=5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <select name="payment_method" class="form-select mb_15">
                                    <option value="">Select Payment Method</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="stripe">Stripe</option>
                                </select>
                                <button type="submit" class="btn btn-primary w-100-p pay-now">Make Payment</button>
                            </form>
                        </div>
                        @endif

                        @if($event->price == 0)
                        <h2 class="mt_30">Free Booking</h2>
                        <div class="pay-sec">
                            <form action="{{ route('event_ticket_free_booking') }}" method="post">
                                @csrf
                                <input type="hidden" name="unit_price" value="{{ $event->price }}">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <select name="number_of_tickets" class="form-select mb_15">
                                    <option value="number_of_tickets">How many tickets?</option>
                                    @for($i=1; $i<=5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-primary w-100-p pay-now">Book Now</button>
                            </form>
                        </div>
                        @endif
                    @endif

                    @if($event->map!='')
                    <h2 class="mt_30">Event Map</h2>
                    <div class="location-map">
                        <iframe src="{{ $event->map }}" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    @endif

                    <h2 class="mt_30">Recent Events</h2>
                    <ul>
                        @foreach($recent_events as $recent_event)
                        <li><a href="{{ route('event',$recent_event->slug) }}"><i class="fas fa-angle-right"></i> {{ $recent_event->name }}</a></li>
                        @endforeach
                    </ul>
                
                    <h2 class="mt_30">Event Enquery</h2>
                    <div class="enquery-form">
                        <form action="{{ route('event_send_message') }}" method="post">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required/>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required />
                            </div>
                            <div class="mb-3">
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number(Optional)" required/>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control h-150" name="message" rows="3" placeholder="Message" required></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    Send Message <i class="fas fa-long-arrow-alt-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection