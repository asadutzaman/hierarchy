@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ url('/') }}/Sailor/assets/medical/css/wfmi-style.css">
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Departments</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_department') }}"> Departments</a></li>
        <li class="breadcrumb-item active">Department View</li>
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
            <i class="fa fa-table mr-2"></i>
            Department Details
        </div>
        <div class="card-body">
            <u><span>Department Name:</span></u>
            <h3>{{ $data->department_name }} </h3>
            <br>
            <u><span>Department Logo:</span></u>
            <br>
            <i class="{{ $data->icon }}"></i>
            <br>
            <br>
            <u><span>Department Image:</span></u>
            <br>
            <img src="{{ URL::to('/') }}/images/departments/{{ $data->image }}" class="img-thumbnail" />
            <br>
            <br>
            <u><span>Department Details:</span></u>
            <p>{!! $data->details !!}</p>
        </div>
    </div>

    <!-- Success History -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><i class="fa fa-bars fa-lg mr-2"></i>Success Story </div>
            </div>
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#success">
                <i class="fa fa-plus-circle mr-2"></i>Add New
            </button>

            <!-- Modal -->
            <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="successLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successLabel">Add Success Story</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('department_success_history_insert') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <!-- <label class="col-md-6"><b>Doctor ID:</b></label> -->
                                <div class="col-md-12">
                                    <input type="hidden" name="department_id" value="{{ $data->id }}" class="form-control input-lg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><b>Enter Headline:</b></label>
                                <div class="col-md-12">
                                    <input type="text" name="headline" class="form-control input-lg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><b>Enter Details:</b></label>
                                <div class="col-md-12">
                                    <textarea name="success_history" cols="30" rows="10" class="ckeditor form-control input-lg"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><b>Select Image:</b></label>
                                <div class="col-md-12">
                                    <input type="file" name="image" />
                                </div>
                            </div>
                            <div class="form-group text-left">
                                <input type="submit" name="add" class="btn btn-primary input-lg" value="Save" />
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card-body">
            <div class="row">
                @foreach($success_history as $success)
                    <div class="col-md-4">
                        <div class="card">
                            <img style="width: 100%; height: 30vw; object-fit: cover;" class="card-img-top" src="{{ URL::to('/') }}/images/departments/success_history/{{ $success->image }}" alt="Card image cap">
                            <div class="card-body">
                                <form action="{{ url('department/success/delete',$success->id) }}" method="post">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure want to delete {{ $success->id }}?')" class="btn btn-outline-danger">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </form>
                                <h5 class="card-title">{{ $success->headline }}</h5>
                                <p class="card-text">{!! $success->success_history !!}</p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection