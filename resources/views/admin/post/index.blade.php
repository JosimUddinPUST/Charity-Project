@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Blogs</h1>
            <div>
                <a href="{{ route('admin_post_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
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
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/'.$post->photo) }}" alt="No Image" class="w_200">
                                                </td>
                                                <td>
                                                    {{ $post->title }}
                                                </td>
                                                <td>
                                                    {{ $post->post_categories ? $post->post_categories->name : 'No Category' }}
                                                </td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('admin_post_edit',$post->id) }}" class="btn btn-primary btn sm"><i class="fas fa-edit"></i></a>

                                                    <a href="{{ route('admin_post_delete',$post->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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