@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ url('/') }}/Sailor/assets/medical/css/wfmi-style.css">
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Job</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_Job') }}"> Job</a></li>
        <li class="breadcrumb-item active">Job View</li>
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
            Job Details
        </div>
        <div class="card-body">
            <u><span>Job title:</span></u>
            <h3>{{ $data->title }} </h3>
            <br>
            <u><span>Job position:</span></u>
            <p>{{ $data->position }}</p>
            <br>
            <u><span>Job last date for apply:</span></u>
            <p>{{ $data->last_date }}</p>
            <br>
            <u><span>Job viva date:</span></u>
            <p>{{ $data->viva_date }}</p>
            <br>
            <u><span>Job Status:</span></u>
            <p>{{ $data->flag }}</p>
            <br>
            <br>
            <u><span>Job Details:</span></u>
            <p>{!! $data->details !!}</p>
        </div>
    </div>

    <!-- applicants History -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><i class="fa fa-bars fa-lg mr-2"></i>Applicants</div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="35%">Name</th>
                        <th width="35%">Phone</th>
                        <th width="30%">Action</th>
                    </tr>
                    @foreach($applicants as $applicant)
                    <tr>
                        <td>{{ $applicant->name }}</td>
                        <td>{{ $applicant->phone }}</td>
                        <td>
                            <a href="{{ route('admin_applicant.show', $applicant->id) }}" class="btn btn-outline-success">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection