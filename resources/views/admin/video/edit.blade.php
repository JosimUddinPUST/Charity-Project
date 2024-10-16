@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Edit Videos</h1>
            <div>
                <a href="{{ route('admin_video_index') }}" class="btn btn-primary"><i class="fas fa-plus"></i>View All</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_video_edit_submit',$video->id) }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Existing Video</label>
                                    <div>
                                        <iframe width="200" height="100" src="https://www.youtube.com/embed/{{ $video->youtube_video_id }}" frameborder="0" allow="accelermeter; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                                        </iframe>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Youtube Video ID*</label>
                                    <div>
                                        <input type="text" class="form-control" name="youtube_video_id" value="{{ $video->youtube_video_id }}" >
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Select Video Category</label>
                                    <select name="video_category_id" class="form-select" >
                                        @foreach($video_categories as $video_category)
                                            <option value="{{ $video_category->id }}" 
                                                @if($video_category->id==$video->video_category_id)
                                                    selected
                                                @endif>
                                                {{ $video_category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection