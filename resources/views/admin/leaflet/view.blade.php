@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ url('/') }}/Sailor/assets/medical/css/wfmi-style.css">
<link href="{{ url('/') }}/Sailor/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">leaflet</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_leaflet') }}"> leaflet</a></li>
        <li class="breadcrumb-item active">leaflet View</li>
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
            leaflet Details
        </div>
        <div class="card-body">
            <u><span>leaflet Name:</span></u>
            <h3>{{ $leaflet->headline }} </h3>
            <br>
            <br>
            <u><span>leaflet Image:</span></u>
            <br>
            <img src="{{ URL::to('/') }}/images/leaflet/{{ $leaflet->image }}" class="img-thumbnail" />
            <br>
            <br>
            <u><span>leaflet Details:</span></u>
            <p>{!! $leaflet->sub_headline !!}</p>
        </div>
    </div>

   
</div>

@endsection