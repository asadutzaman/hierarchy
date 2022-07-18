@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ url('/') }}/Sailor/assets/medical/css/wfmi-style.css">
<link href="{{ url('/') }}/Sailor/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">News And Event</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_news_and_event') }}"> News And Event</a></li>
        <li class="breadcrumb-item active">News And Event View</li>
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
            Details
        </div>
        <div class="card-body">
            <u><span>News And Event:</span></u>
            <h3>{{ $news_and_event->headline }} </h3>
            {{  date("d M Y", strtotime($news_and_event->created_at)) }}
            <br>
            <br>
            <u><span> Image:</span></u>
            <br>
            <img src="{{ URL::to('/') }}/images/news_and_events/{{ $news_and_event->image }}" class="img-thumbnail" />
            <br>
            <br>
            <u><span> Details:</span></u>
            <p>{!! $news_and_event->details !!}</p>
        </div>
    </div>

   
</div>

@endsection