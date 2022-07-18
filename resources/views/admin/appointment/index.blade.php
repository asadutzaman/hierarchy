@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ url('/') }}/Sailor/assets/medical/css/wfmi-style.css">
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Appointment</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active">Appointment</li>
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
            <i class="fa fa-table mr-1"></i>
            Appointment
            <a class="btn btn-success float-right" href="{{ url('/admin_appointment_all') }}">All Appointment</a>
        </div>
        <div class="card-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th width="5%">MRN</th>
                <th width="10%">Patient</th>
                <th width="10%">Address</th>
                <th width="10%">Doctor</th>
                <th width="10%">Date</th>
                <th width="10%">Action</th>
            </tr>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->mrn }}</td>
                <td>Name-{{ $row->patient_name }} <br> Date of birth-{{ $row->dob }}</td>
                <td>{{ $row->phone }}<br> Address-{{ $row->address }}</td>
                <td>{{ $row->doctors->name }}</td>
                <td>{{ $row->appointment_date }}<br>{{ $row->prefer_time }}</td>
                <td>
                    <a href="{{ route('admin_appointment.show', $row->id) }}" class="btn btn-outline-success">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                    </a>
                    <a  class="btn btn-outline-warning" data-toggle="modal" data-target="#appointmentModal{{$row->id}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="appointmentModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="appointmentModal{{$row->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm Appointment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('admin_appointment.update', $row->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label class="col-md-6"><b>Confirm Appointment:</b></label>
                                            <div class="col-md-12">
                                                <select name="confirm" class="form-control">
                                                    <option value="1" selected>Yes</option>
                                                    <option value="0">No</option>
                                                    <option value="2">Cancel</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6"><b>Comment (If any):</b></label>
                                            <div class="col-md-12">
                                                <select name="confirm_time" class="form-control">
                                                    <option>--Select--</option>
                                                    <option value="9 AM - 10 AM">9 AM - 10 AM</option>
                                                    <option value="10 AM - 11 AM">10 AM - 11 AM</option>
                                                    <option value="11 AM - 12 PM">11 AM - 12 PM</option>
                                                    <option value="12 PM - 1 PM">12 PM - 1 PM</option>
                                                    <option value="1 PM - 2 PM">1 PM - 2 PM</option>
                                                    <option value="2 PM - 3 PM">2 PM - 3 PM</option>
                                                    <option value="3 PM - 4 PM">3 PM - 4 PM</option>
                                                    <option value="4 PM -5 PM">4 PM -5 PM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6"><b>Comment (If any):</b></label>
                                            <div class="col-md-12">
                                                <textarea name="comment" cols="30" rows="5" class="form-control input-lg"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group text-left">
                                            <input type="submit" name="add" class="btn btn-primary input-lg" value="Update" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onClick="window.location.reload();" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $data->links() !!}

        </div>
    </div>
</div>
@endsection
