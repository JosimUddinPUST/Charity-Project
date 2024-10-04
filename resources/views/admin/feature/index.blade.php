@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Features</h1>
            <div>
                <a href="{{ route('admin_feature_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12" >
                    <div class="card">
                        <div class="card-body" style="text-align: left">
                            <h5>Section Items</h5>
                            <form action="{{ route('admin_feature_section_update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$feature_section_items->photo) }}" alt="No Img" class="w_200">
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
                                                <option value="show" @if($feature_section_items->status== 'show')selected @endif>Show</option>
                                                <option value="hide" @if($feature_section_items->status== 'hide')selected @endif>Hide</option>
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
                            <h5>All Features</h5>
                            <table class="table table-boardered" id="example1">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>SL</th>
                                        <th>Icon</th>
                                        <th>Heading</th>
                                        <th >Text</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($features as $feature)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <i class="{{ $feature->icon }}" style="font-size: 30px"></i>
                                            </td>
                                            <td>
                                                {{ $feature->heading }}
                                            </td>
                                            <td style="text-align: justify">
                                                {{ $feature->text }}
                                            </td>
                                            <td class="pt_10 pb_10" style="column-width: 120px ">
                                                <a href="{{ route('admin_feature_edit',$feature->id) }}" class="btn btn-primary btn sm"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin_feature_delete',$feature->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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