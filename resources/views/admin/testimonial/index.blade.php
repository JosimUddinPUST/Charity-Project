@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Testimonials</h1>
            <div>
                <a href="{{ route('admin_testimonial_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Section Items</h5>
                            <form action="{{ route('admin_testimonial_section_update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Heading</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div>
                                                <input type="text" class="form-control" name="heading" value="{{ $testimonial_section_items->heading }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$testimonial_section_items->photo) }}" alt="No Img" class="w_200">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Change Photo</label>
                                    <input type="file" name="photo">
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label>Status</label>
                                            <select name="status" class="form-select" >
                                                <option value="show" @if($testimonial_section_items->status== 'show')selected @endif>Show</option>
                                                <option value="hide" @if($testimonial_section_items->status== 'hide')selected @endif>Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Testimonials</h5>
                            <table class="table table-boardered" id="example1" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/'.$testimonial->photo) }}" alt="No Image" class="w_150">
                                            </td>
                                            <td>
                                                {{ $testimonial->name }}
                                            </td>
                                            <td>
                                                {{ $testimonial->designation }}
                                            </td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_testimonial_edit',$testimonial->id) }}" class="btn btn-primary btn sm"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin_testimonial_delete',$testimonial->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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