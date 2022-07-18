@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Appointment</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_appointment') }}"> Appointment</a></li>
        <li class="breadcrumb-item active">Appointment Update</li>
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
            Appointment Update
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin_appointment.update', $data->id) }}" enctype="multipart/form-data">
            
                @csrf
                @method('PATCH')
                    <div class="form-group">
                        <label class="col-md-6"><b>Publish:</b></label>
                        <div class="col-md-12">
                            <!-- <input type="text" name="publish" class="form-control input-lg" /> -->
                            <select name="publish" class="form-control">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6"><b>Title:</b></label>
                        <div class="col-md-12">
                            <input type="text" name="title" value="{{ $data->title }}" class="form-control input-lg" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Short Details:</b></label>
                        <div class="col-md-12">
                        <textarea name="short_description" cols="30" rows="10" class="ckeditor form-control input-lg">{{ $data->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Publish date:</b></label>
                        <div class="col-md-12">
                            <input type="date" name="publish_date" value="{{ $data->publish_date }}" class="form-control input-lg" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Select File (PDF):</b></label>
                        <div class="col-md-12">
                            <input type="file"  name="file" value="{{ url('/') }}/appointment/{{ $data->file }}" class="form-control input-lg">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Select cover image:</b></label>
                        <div class="col-md-12">
                            <input type="file"  name="image" value="{{ url('/') }}/images/appointment/{{ $data->image }}" class="form-control input-lg">
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