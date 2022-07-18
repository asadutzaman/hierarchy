@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ url('/') }}/Sailor/assets/medical/css/wfmi-style.css">
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Departments</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ url('/admin2') }}"> Dashboard</a></li>
        <li class="breadcrumb-item active">Departments</li>
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
            Departments
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus-circle"></i>
                Add New
            </button>
        </div>
        <div class="card-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th width="10%">Image</th>
                <th width="35%">Department</th>
                <th width="35%">Icon</th>
                <th width="30%">Action</th>
            </tr>
            @foreach($data as $row)
            <tr>
                <td><img src="{{ URL::to('/') }}/images/departments/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
                <td>{{ $row->department_name }}</td>
                <td><i class="{{ $row->icon }}" style="font-size: 5em;"></i></td>
                <td>
                    
                    <form action="{{ route('admin_department.destroy', $row->id) }}" method="post">
                        <a href="{{ route('admin_department.show', $row->id) }}" class="btn btn-outline-success">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('admin_department.edit', $row->id) }}" class="btn btn-outline-warning">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure want to delete {{ $row->department_name }}?')" class="btn btn-outline-danger">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $data->links() !!}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin_department.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-6"><b>Enter Department Name:</b></label>
                        <div class="col-md-12">
                            <input type="text" name="department_name" class="form-control input-lg" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Enter Icon Class:</b></label>
                        <div class="col-md-12">
                            <input type="text" name="icon" class="form-control input-lg" />
                        </div>
                        <span>For Icon please go to the </br> https://samcome.github.io/webfont-medical-icons/</br> skip the first "."</span>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Enter Details:</b></label>
                        <div class="col-md-12">
                        <textarea name="details" cols="30" rows="10" class="ckeditor form-control input-lg"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12"><b>Select Department Image:</b></label>
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
                <button type="button" onClick="window.location.reload();" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

        </div>
    </div>
</div>
@endsection
