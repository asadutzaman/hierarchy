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
            <u><span>Name:</span></u>
            <h3>{{ $data->name }} </h3>
            <br>
            <u><span>Phone:</span></u>
            <p>{{ $data->phone }}</p>
            <br>
            <u><span>Email:</span></u>
            <p>{{ $data->email }}</p>
            <br>
            <u><span>Status:</span></u>
            <p>{{ $data->flag }}</p>
            <br>
            <p>
                <iframe src="{{ url('/') }}/cv/{{ $data->resume }}" style="width:100%;height:1800px;"></iframe>
            </p>
        </div>
    </div>
</div>
@endsection