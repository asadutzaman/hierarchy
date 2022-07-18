@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ url('/') }}/Sailor/assets/medical/css/wfmi-style.css">
<link href="{{ url('/') }}/Sailor/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Service</h1>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('/admin_service') }}"> Service</a></li>
        <li class="breadcrumb-item active">Service View</li>
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
            Service Details
        </div>
        <div class="card-body">
            <u><span>Service Name:</span></u>
            <h3>{{ $data->name }} </h3>
            <br>
            <u><span>Service Logo:</span></u>
            <br>
            <i class="{{ $data->icon }}" style="font-size: 5em;"></i>
            <br>
            <br>
            <u><span>Service Image:</span></u>
            <br>
            <img src="{{ URL::to('/') }}/images/services/{{ $data->image }}" class="img-thumbnail" />
            <br>
            <br>
            <u><span>Service Details:</span></u>
            <p>{!! $data->details !!}</p>
        </div>
    </div>

    <!-- Service Points -->
    <!-- <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"><i class="fa fa-bars fa-lg mr-2"></i>Service Points </div>
            </div>
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#service_pointsModal">
                <i class="fa fa-plus-circle mr-2"></i>Add New
            </button>
            <div class="modal fade" id="service_pointsModal" tabindex="-1" role="dialog" aria-labelledby="specialistModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="specialistModalLabel">Add New Specialist</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            
        <!-- <div class="card-body">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->headline }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> -->
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