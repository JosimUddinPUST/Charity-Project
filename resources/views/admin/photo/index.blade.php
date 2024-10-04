@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Photos</h1>
            <div>
                <a href="{{ route('admin_photo_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
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
                                        <th>Photo Category</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($photos as $photo)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $photo->photo_categories ? $photo->photo_categories->name : 'No Category' }}
                                                </td>
                                                
                                                <td>
                                                    <img src="{{ asset('uploads/'.$photo->photo) }}" alt="No Image" class="w_200">
                                                </td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('admin_photo_edit',$photo->id) }}" class="btn btn-primary btn sm"><i class="fas fa-edit"></i></a>

                                                    <a href="{{ route('admin_photo_delete',$photo->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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