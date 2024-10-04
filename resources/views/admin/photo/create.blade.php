@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Create Photo</h1>
            <div>
                <a href="{{ route('admin_photo_index') }}" class="btn btn-primary"><i class="fas fa-plus"></i>View All</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_photo_create_submit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Photo*</label>
                                    <div>
                                        <input type="file" name="photo" >
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Select Photo Category</label>
                                    <select name="photo_category_id" class="form-select" >
                                        @foreach($photo_categories as $photo_category)
                                            <option value="{{ $photo_category->id }}">
                                                {{ $photo_category->name }}
                                            </option>
                                        @endforeach
                                    </select>
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