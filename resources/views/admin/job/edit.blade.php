@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Jobs</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_job') }}"> Jobs</a></li>
        <li class="breadcrumb-item active">job Update</li>
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
            job Update
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin_job.update', $data->id) }}" enctype="multipart/form-data">
            
                @csrf
                @method('PATCH')
                <div class="form-group">
                        <label class="col-md-6"><b>Job Title:</b></label>
                        <div class="col-md-12">
                            <input type="text" name="title" value="{{ $data->title }}" class="form-control input-lg" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Position:</b></label>
                        <div class="col-md-12">
                            <input type="text" name="position" value="{{ $data->position }}" class="form-control input-lg" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Enter Details:</b></label>
                        <div class="col-md-12">
                        <textarea name="details" cols="30" rows="10" class="ckeditor form-control input-lg">{{ $data->details }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Last date for applying:</b></label>
                        <div class="col-md-12">
                            <input type="date" name="last_date" value="{{ $data->last_date }}" class="form-control input-lg" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Viva date:</b></label>
                        <div class="col-md-12">
                            <input type="date" value="{{ $data->viva_date }}" name="viva_date" class="form-control input-lg" />
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