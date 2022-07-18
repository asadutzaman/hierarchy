@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Doctors</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_department') }}"> Video</a></li>
        <li class="breadcrumb-item active">Video</li>
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
            <i class="fas fa-table mr-1"></i>
            video Update
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin_video.update', $data->id) }}" enctype="multipart/form-data">
            
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="sel1">Select Doctor:</label>
                    <select class="form-control" name="doctor_id">
                    <option value="{{ $data->doctor_id }}">{{ $data->doctors->name }}</option>
                    @foreach($doctors as $doc)
                        <option value="{{ $data->id }}">{{ $doc->name }}</option>
                    @endforeach    
                    </select>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Enter Video Descriptions:</b></label>
                        <div class="col-md-12">
                            <textarea name="description" cols="30" rows="10" class="ckeditor form-control input-lg">{!! $data->description !!} </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Enter Embaded Video Link:</b></label>
                        <div class="col-md-12">
                            <input type="text" name="youtube_link" value="{{ $data->youtube_link }}" class="form-control input-lg" />
                        </div>
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