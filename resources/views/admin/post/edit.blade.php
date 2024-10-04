@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Edit Post</h1>
            <div>
                <a href="{{ route('admin_post_index') }}" class="btn btn-primary"><i class="fas fa-plus"></i>View All</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_post_edit_submit',$post->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$post->photo) }}" class="w_200">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Change Photo</label>
                                    <div>
                                        <input type="file" name="photo" >
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Title*</label>
                                    <div>
                                        <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Slug*</label>
                                    <div>
                                        <input type="text" class="form-control" name="slug" value="{{ $post->slug }}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Short Description*</label>
                                    <div>
                                        <textarea type="text" class="form-control h_100" name="short_description" >{{ $post->short_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Description*</label>
                                    <div>
                                        <textarea type="text" class="form-control editor" name="description" >{{ $post->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tags</label>
                                    <select name="tags[]" class="form-select select2_tags" multiple="multiple"> 
                                        @for($i=0;$i<count($post_tags);$i++)
                                            <option value="{{ $post_tags[$i] }}" selected>
                                                {{ $post_tags[$i] }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Select Post Category</label>
                                    <select name="post_category_id" class="form-select" >
                                        @foreach($post_categories as $post_category)
                                            <option value="{{ $post_category->id }}" 
                                                @if($post_category->id==$post->post_category_id)
                                                    selected
                                                @endif>
                                                {{ $post_category->name }}
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