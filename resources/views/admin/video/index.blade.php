@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Videos</h1>
            <div>
                <a href="{{ route('admin_video_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-boardered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Video Category</th>
                                        <th>Youtube Video ID</th>
                                        <th>Video Preview</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($videos as $video)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $video->video_categories ? $video->video_categories->name : 'No Category' }}
                                                </td>
                                                <td> {{$video->youtube_video_id}} </td>
                                                <td>
                                                    <iframe width="200" height="100" src="https://www.youtube.com/embed/{{ $video->youtube_video_id }}" frameborder="0" allow="accelermeter; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">

                                                    </iframe>
                                                </td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('admin_video_edit',$video->id) }}" class="btn btn-primary btn sm"><i class="fas fa-edit"></i></a>

                                                    <a href="{{ route('admin_video_delete',$video->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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