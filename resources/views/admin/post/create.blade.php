@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Create Post</h1>
            <div>
                <a href="{{ route('admin_post_index') }}" class="btn btn-primary"><i class="fas fa-plus"></i>View All</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_post_create_submit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Photo*</label>
                                    <div>
                                        <input type="file" name="photo" >
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Title*</label>
                                    <div>
                                        <input type="text" class="form-control" name="title" >
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Slug*</label>
                                    <div>
                                        <input type="text" class="form-control" name="slug" >
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Short Description*</label>
                                    <div>
                                        <textarea type="text" class="form-control h_100" name="short_description" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Description*</label>
                                    <div>
                                        <input type="text" class="form-control editor" name="description" >
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Select Post Category</label>
                                    <select name="post_category_id" class="form-select" >
                                        @foreach($post_categories as $post_category)
                                            <option value="{{ $post_category->id }}">
                                                {{ $post_category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Tags</label>
                                    <select name="tags[]" class="form-select select2_tags" > </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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