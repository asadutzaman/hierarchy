@extends('admin.layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Doctors</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_department') }}"> Doctors</a></li>
        <li class="breadcrumb-item active">Doctor View</li>
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
    
    <!-- profile details -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fa fa-table fa-lg mr-2"></i>
            Doctor Details
        </div>
        <div class="card-body">
            <h3>{{ $data->name }} </h3>
            {{ $data->designation }}
            <br>
            <img src="{{ URL::to('/') }}/images/doctors/{{ $data->image }}" class="img-thumbnail" />
            
            <br><br>
                {{ $data->department->department_name }}
            <br>
            <br>
            <br>
            <u><span>Personal Details:</span></u>
            <p>{!! $data->personal_details !!}</p>
            <br>
            <u><span>Credentials:</span></u>
            <p>{!! $data->credentials !!}</p>
        </div>
    </div>

    <!-- specility and schedule -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <i class="fa fa-bars fa-lg mr-2"></i>Specialty
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#specialistModal">
                        <i class="fa fa-plus-circle mr-2"></i>Add New
                    </button>
                </div>
                <div class="col-md-6">
                    <i class="fa fa-clock-o fa-lg mr-2"></i>Schedule   
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <i class="fa fa-plus-circle mr-2"></i>Add New
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Speciality</th>
                            <th>Action</th>
                        </tr>
                        @foreach($specialist as $spe)
                            <tr>
                                <td>{!! $spe->specialist !!}</td>
                                <td>
                                    <form action="{{ url('specialist/delete',$spe->id) }}" method="post">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure want to delete {{ $spe->specialist }}?')" class="btn btn-outline-danger">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-md-6">
                    @foreach($schedule as $sch)
                        <i class="fa fa-angle-right mr-2"></i>{{ $sch->day }} -> 
                            @php
                                if($sch->time == 1){
                                    echo '<button class="btn btn-danger btn-sm">Day Off</button>';
                                }
                                else{
                                    echo $sch->time;
                                }
                            @endphp
                         <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="specialistModalLabel">Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST"" action="{{ url('schedule_add') }}">
                    @csrf
                    @method('POST')
                    
                    <div class="row">
                        <div class="form-group mb-1">
                            <label for="staticEmail2" class="sr-only">Day</label>
                            <input type="hidden" readonly name="doctor_id[]" value="{{ $data->id }}" class="form-control-plaintext" />
                            <input type="text" readonly name="day[]" class="form-control-plaintext" value="Saturday">
                        </div>
                        <div class="form-group  mb-1">
                            <div class="form-check form-check-inline">
                                <label class="sr-only">Time</label>
                                <input class="form-check-input" name="time[]" type="checkbox" value="1">
                                <label class="form-check-label">Off&nbsp;&nbsp;</label>
                                <input type="text" name="time[]" class="form-control" placeholder="Time">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-1">
                            <label for="staticEmail2" class="sr-only">Day</label>
                            <input type="hidden" readonly name="doctor_id[]" value="{{ $data->id }}" class="form-control-plaintext" />
                            <input type="text" readonly name="day[]" class="form-control-plaintext" value="Sunday">
                        </div>
                        <div class="form-group  mb-1">
                            <div class="form-check form-check-inline">
                                <label class="sr-only">Time</label>
                                <input class="form-check-input" name="time[]" type="checkbox" value="1">
                                <label class="form-check-label">Off&nbsp;&nbsp;</label>
                                <input type="text" name="time[]" class="form-control" placeholder="Time">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-1">
                            <label for="staticEmail2" class="sr-only">Day</label>
                            <input type="hidden" readonly name="doctor_id[]" value="{{ $data->id }}" class="form-control-plaintext" />
                            <input type="text" readonly name="day[]" class="form-control-plaintext" value="Monday">
                        </div>
                        <div class="form-group  mb-1">
                            <div class="form-check form-check-inline">
                                <label class="sr-only">Time</label>
                                <input class="form-check-input" name="time[]" type="checkbox" value="1">
                                <label class="form-check-label">Off&nbsp;&nbsp;</label>
                                <input type="text" name="time[]" class="form-control" placeholder="Time">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-1">
                            <label for="staticEmail2" class="sr-only">Day</label>
                            <input type="hidden" readonly name="doctor_id[]" value="{{ $data->id }}" class="form-control-plaintext" />
                            <input type="text" readonly name="day[]" class="form-control-plaintext" value="Tuesday">
                        </div>
                        <div class="form-group  mb-1">
                            <div class="form-check form-check-inline">
                                <label class="sr-only">Time</label>
                                <input class="form-check-input" name="time[]" type="checkbox" value="1">
                                <label class="form-check-label">Off&nbsp;&nbsp;</label>
                                <input type="text" name="time[]" class="form-control" placeholder="Time">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-1">
                            <label for="staticEmail2" class="sr-only">Day</label>
                            <input type="hidden" readonly name="doctor_id[]" value="{{ $data->id }}" class="form-control-plaintext" />
                            <input type="text" readonly name="day[]" class="form-control-plaintext" value="Wednesday">
                        </div>
                        <div class="form-group  mb-1">
                            <div class="form-check form-check-inline">
                                <label class="sr-only">Time</label>
                                <input class="form-check-input" name="time[]" type="checkbox" value="1">
                                <label class="form-check-label">Off&nbsp;&nbsp;</label>
                                <input type="text" name="time[]" class="form-control" placeholder="Time">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-1">
                            <label for="staticEmail2" class="sr-only">Day</label>
                            <input type="hidden" readonly name="doctor_id[]" value="{{ $data->id }}" class="form-control-plaintext" />
                            <input type="text" readonly name="day[]" class="form-control-plaintext" value="Thursday ">
                        </div>
                        <div class="form-group  mb-1">
                            <div class="form-check-inline">
                                <label class="sr-only">Time</label>
                                <input class="form-check-input" name="time[]" type="checkbox" value="1">
                                <label class="form-check-label">Off&nbsp;&nbsp;</label>
                                <input type="text" name="time[]" class="form-control" placeholder="Time">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    
                        <div class="form-group mb-1">
                            <label for="staticEmail2" class="sr-only">Day</label>
                            <input type="hidden" readonly name="doctor_id[]" value="{{ $data->id }}" class="form-control-plaintext" />
                            <input type="text" readonly name="day[]" class="form-control-plaintext" value="Friday">
                        </div>
                        <div class="form-group  mb-1">
                            <div class="form-check-inline">
                                <label class="sr-only">Time</label>
                                <input class="form-check-input" name="time[]" type="checkbox" value="1">
                                <label class="form-check-label">Off&nbsp;&nbsp;</label>
                                <input type="text" name="time[]" class="form-control" placeholder="Time">
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group text-left">
                        <input type="submit" name="add" class="btn btn-primary input-lg" value="Save" />
                    </div>
                </form>
            </div>
        </div>
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
                        <form method="post" action="{{ url('admin_doctor_success_history_insert') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <!-- <label class="col-md-6"><b>Doctor ID:</b></label> -->
                                <div class="col-md-12">
                                    <input type="hidden" name="doctor_id" value="{{ $data->id }}" class="form-control input-lg" />
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
                            <img style="width: 100%; height: 30vw; object-fit: cover;" class="card-img-top" src="{{ URL::to('/') }}/images/doctors/success_history/{{ $success->image }}" alt="Card image cap">
                            <div class="card-body">
                                <form action="{{ url('success/delete',$success->id) }}" method="post">
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



<!--Specialist Modal -->
<div class="modal fade" id="specialistModal" tabindex="-1" role="dialog" aria-labelledby="specialistModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="specialistModalLabel">Add New Specialist</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('dynamic-specialist.insert') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-md-12"><b>Enter Specialty:</b></label>
                    <div class="col-md-12">
                        <input type="hidden" name="doctor_id" value="{{ $data->id }}" class="form-control" />
                        <textarea name="specialist" cols="30" rows="5" class="ckeditor form-control input-lg"></textarea>
                    </div>
                </div>
                <div class="form-group text-left">
                    <input type="submit" name="add" class="btn btn-primary input-lg" value="Save" />
                </div>

            </form>
            <!-- <div class="table-responsive">
                <form method="post" id="dynamic_form">
                    <span id="result"></span>
                    <table class="table table-bordered table-striped" id="user_table">
                        <thead>
                            <tr>
                                <th width="90%">Specialists</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="1" align="right">&nbsp;</td>
                                <td>
                                    @csrf
                                    <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div> -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>



<!-- <script>
    $(document).ready(function(){
        var count = 1;
        dynamic_field(count);

        function dynamic_field(number){
            html = '<tr>';
                html += '<input type="hidden" name="doctor_id[]" value="{{ $data->id }}" class="form-control" />';
                html += '<td><input type="text" name="specialist[]" class="form-control" /></td>';
                if(number > 1){
                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">X</button></td></tr>';
                    $('tbody').append(html);
                }
                else{
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus-circle"></i></button></td></tr>';
                    $('tbody').html(html);
                }
            }

        $(document).on('click', '#add', function(){
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function(){
            count--;
            $(this).closest("tr").remove();
        });

        $('#dynamic_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:'{{ route("dynamic-specialist.insert") }}',
                method:'post',
                data:$(this).serialize(),
                dataType:'json',
                beforeSend:function(){
                    $('#save').attr('disabled','disabled');
                },
                success:function(data){
                    if(data.error){
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++){
                            error_html += '<p>'+data.error[count]+'</p>';
                        }
                        $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                    }
                    else{
                        dynamic_field(1);
                        $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                        location.reload();
                    }
                    $('#save').attr('disabled', false);
                }
            })
        });
    });
</script> -->
@endsection