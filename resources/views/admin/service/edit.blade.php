@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Service</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_service') }}"> Service</a></li>
        <li class="breadcrumb-item active">Service Update</li>
    </ol>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fa fa-table mr-1"></i>
            Service Update
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin_service.update', $data->id) }}" enctype="multipart/form-data">
            
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label class="col-md-6"><b>Enter Service Name:</b></label>
                    <div class="col-md-12">
                        <input type="text" name="name" value="{{ $data->name }}" class="form-control input-lg" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12"><b>Enter Icon Class:</b></label>
                    <div class="col-md-12">
                        <input type="text" name="icon" value="{{ $data->icon }}" class="form-control input-lg" />
                        <span>For Icon please go to the </br> https://samcome.github.io/webfont-medical-icons/ </br> skip the first "."</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12"><b>Enter Details:</b></label>
                    <div class="col-md-12">
                        <textarea name="details" cols="30" rows="10" class="ckeditor form-control input-lg">{!! $data->details !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12"><b>Select Department Image:</b></label>
                    <div class="col-md-12">
                        <img src="{{ URL::to('/') }}/images/services/{{ $data->image }}" class="img-thumbnail" width="400" /></br>
                        <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
                        <input type="file" name="image" />
                    </div>
                </div>
                <div class="form-group text-left">
                    <input type="submit" name="add" class="btn btn-success input-lg" value="Update" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection