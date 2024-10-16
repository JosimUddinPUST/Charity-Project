@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Event ({{ $single_event->name }}) Videos</h1>
            <div>
                <a href="{{ route('admin_event_index') }}" class="btn btn-primary">Back To Events</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_event_video_submit')}}" method="post">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $single_event->id }}">
                                <div class="form-group mb-3">
                                    <label>Youtube Video ID*</label>
                                    <div>
                                        <input type="text" class="form-control" name="video">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-boardered" id="example1">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>SL</th>
                                        <th>Video ID</th>
                                        <th>Video Preview</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($event_videos as $event_video)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$event_video->video }}</td>
                                            <td>
                                                <iframe width="200" height="100" src="https://www.youtube.com/embed/{{ $event_video->video}}" frameborder="0" allow="accelermeter; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                                                </iframe>
                                            </td>
                                            <td class="pt_10 pb_10" style="column-width: 150px;">
                                                <a href="{{ route('admin_event_video_delete',$event_video->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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