@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ url('/') }}/Sailor/assets/medical/css/wfmi-style.css">
<link href="{{ url('/') }}/Sailor/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">package</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_package') }}"> package</a></li>
        <li class="breadcrumb-item active">package View</li>
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
            package Details
        </div>
        <div class="card-body">
            <u><span>package Name:</span></u>
            <h3>{{ $package->name }} </h3>
            <br>
            <h3>{{ $package->price }} </h3>
            <br>
            <u><span>package Image:</span></u>
            <br>
            <img src="{{ URL::to('/') }}/images/packages/{{ $package->image }}" class="img-thumbnail" />
            <br>
            <br>
            <u><span>package Details:</span></u>
            <p>{!! $package->details !!}</p>
        </div>
    </div>

   
</div>

@endsection