@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ url('/') }}/Sailor/assets/medical/css/wfmi-style.css">
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Appointment</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_appointment') }}"> Appointment</a></li>
        <li class="breadcrumb-item active">Appointment View</li>
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
            Appointment Details
        </div>
        <div class="card-body">
            <u><span>Patient MRN:</span></u>
            <p>{{ $data->mrn }} </p>
            <br>
            <u><span>Patient name:</span></u>
            <p>{{ $data->patient_name }} </p>
            <br>
            <u><span>Patient Date of birth:</span></u>
            <p>{{ $data->dob }} </p>
            <br>
            <u><span>Patient Address:</span></u>
            <p>{{ $data->patient_address }} </p>
            <br>
            <u><span>Patient phone:</span></u>
            <p>{{ $data->phone }} </p>
            <br>
            <u><span>Patient email:</span></u>
            <p>{{ $data->email }} </p>
            <br>
            <u><span>Appointment Date:</span></u>
            <p>{{ $data->appointment_date }} </p>
            <br>
            <u><span>Appointment prefer time:</span></u>
            <p>{{ $data->prefer_time }} </p>
            <br>
            <u><span>Appointment prefer time:</span></u>
            <p>{{ $data->doctors->name }} </p>
            <br>
            <u><span>Problem:</span></u>
            <p>{{ $data->problem }} </p>
            <br>
            <u><span>Appointment confirmation:</span></u>
            <p>
                @php
                    if($data->confirm=='0'){
                        echo 'Not Confirm';
                    }
                    if($data->confirm=='1'){
                        echo 'Confirm';
                    }
                    if($data->confirm=='2'){
                        echo 'Cancel';
                    }
                @endphps
            </p>
            <br>
            <u><span>Comment:</span></u>
            <p>{{ $data->comment }} </p>
            <br>
            
        </div>
    </div>
</div>
@endsection