@extends('admin.layouts.app')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between" >
            <h1>Edit Feature</h1>
            <div>
                <a href="{{ route('admin_feature_index') }}" class="btn btn-primary"><i class="fas fa-plus"></i>View All</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_feature_edit_submit',$feature->id) }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Icon*</label>
                                    <input type="text" value="{{ $feature->icon }}" class="form-control" name="icon">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Heading*</label>
                                    <input type="text" class="form-control" name="heading" value="{{ $feature->heading }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Text*</label>
                                    <textarea name="text"  class="form-control h_200" cols="30" rows="10" style="color: black; text-color:black">{{ $feature->text }}</textarea>
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