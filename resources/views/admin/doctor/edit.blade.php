@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Doctors</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_department') }}"> Doctors</a></li>
        <li class="breadcrumb-item active">Doctor Update</li>
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
            Doctors Update
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin_doctors.update', $data->id) }}" enctype="multipart/form-data">
            
                @csrf
                @method('PATCH')
                    <div class="form-group">
                        <label for="sel1">Publish?:</label>
                        <select class="form-control" name="publish">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Residence Doctor?:</label>
                        <select class="form-control" name="residence">
                            <option value="yes">Yes - Residence Doctor</option>
                            <option value="no">No - Visiting Doctor</option>   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Select Department:</label>
                        <select class="form-control" name="department_id">
                        <option value="{{ $data->department_id }}">{{ $data->department->department_name }}</option>
                        @foreach($departments as $dep)
                            <option value="{{ $dep->id }}">{{ $dep->department_name }}</option>
                        @endforeach    
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6"><b>Enter Doctor Name:</b></label>
                        <div class="col-md-12">
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control input-lg" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Enter Designation:</b></label>
                        <div class="col-md-12">
                            <input type="text" name="designation" value="{{ $data->designation }}" class="form-control input-lg" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Enter Credentials:</b></label>
                        <div class="col-md-12">
                            <textarea name="credentials" cols="30" rows="5" class="ckeditor form-control input-lg">{!! $data->credentials !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Enter Personal Details:</b></label>
                        <div class="col-md-12">
                            <textarea name="personal_details" cols="30" rows="10" class="ckeditor form-control input-lg">{!! $data->personal_details !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-12"><b>Select Doctor Image:</b></label>
                    <div class="col-md-12">
                        <img src="{{ URL::to('/') }}/images/doctors/{{ $data->image }}" class="img-thumbnail" width="400" /></br>
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