@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ url('/') }}/Sailor/assets/medical/css/wfmi-style.css">
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Bulletin</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_bulletin') }}"> Bulletin</a></li>
        <li class="breadcrumb-item active">Bulletin View</li>
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
            Bulletin Details
        </div>
        <div class="card-body">
            <u><span>Bulletin Published date:</span></u>
            <h3>{{ $data->publish_date }} </h3>
            <br>
            <u><span>Bulletin title:</span></u>
            <h3>{{ $data->title }} </h3>
            <br>
            <img src="{{ url('/') }}/images/bulletin/{{ $data->image }}" class="img-thumbnail" alt="Bulletin front page">
            <br>
            <u><span>Short Details:</span></u>
            <p>{!! $data->short_description !!}</p>
            <br>
            <u><span>Bulletin File:</span></u>
            <p>
                <iframe src="{{ url('/') }}/bulletin/{{ $data->file }}" style="width:100%;height:1800px;"></iframe>
            </p>
        </div>
    </div>
</div>
@endsection