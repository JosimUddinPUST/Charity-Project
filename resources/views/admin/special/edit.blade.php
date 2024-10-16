@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Edit Special</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_special_edit_submit',$special->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Heading*</label>
                                            <input type="text" class="form-control" name="heading" value="{{ $special->heading }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Sub Heading</label>
                                            <input type="text" class="form-control" name="sub_heading" value=" {{ $special->sub_heading }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Text*</label>
                                    <textarea name="text"  class="form-control editor" cols="30" rows="10" style="color: black; text-color:black">{{ $special->text }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Button Text</label>
                                            <input type="text" value="{{ $special->button_text }}" class="form-control" name="button_text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Button Link</label>
                                            <input type="text" class="form-control" name="button_link" value="{{ $special->button_link }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Video ID*</label>
                                            <input type="text" class="form-control" name="video_id" value="{{ $special->video_id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Status</label>
                                            <select name="status" class="form-select" >
                                                <option value="show" @if($special->status== 'show')selected @endif>Show</option>
                                                <option value="hide" @if($special->status== 'hide')selected @endif>Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$special->photo) }}" class="w_200">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Change Photo</label>
                                    <div>
                                        <input type="file" name="photo" >
                                    </div>
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