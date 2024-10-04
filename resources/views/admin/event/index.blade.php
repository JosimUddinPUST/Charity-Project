@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Events</h1>
            <div>
                <a href="{{ route('admin_event_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-boardered" id="example1">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Date & Time</th>
                                        <th>Price</th>
                                        <th>Total Seat</th>
                                        <th>Booked Seat</th> 
                                        <th>Gallery</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/'.$event->featured_photo) }}" alt="No Image" class="w_200">
                                            </td>
                                            <td>
                                                {{ $event->name }}
                                            </td>
                                            <td>
                                                {{ $event->date }}<br>{{ $event->time }}
                                            </td>
                                            <td>
                                                {{ $event->price }}
                                            </td>
                                            <td>
                                                {{ $event->total_seat }}
                                            </td>
                                            <td>
                                                {{ $event->booked_seat }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin_event_photo',$event->id) }}" class="btn btn-primary btn-sm mb_5">Photo Gallery</a>
                                                <a href="{{ route('admin_event_video',$event->id) }}" class="btn btn-success btn-sm mb_5">Video Gallery</a>
                                            </td>
                                            <td class="pt_10 pb_10" style="column-width: 150px;">
                                                <a href="{{ route('admin_event_edit',$event->id) }}" class="btn btn-primary btn sm"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin_event_delete',$event->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection