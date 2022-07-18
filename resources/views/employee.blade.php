@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-10">
                <div class="card-header">
                    <i class="fa fa-table mr-1"></i>
                    Employee Table
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus-circle"></i>
                        Add New
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="25%">Name</th>
                            <th width="5%">Department</th>
                            <th width="35%">Role</th>
                        </tr>
                        @foreach($employee as $emp)
                            <tr>
                                <td>{{$emp->user->name}}</td>
                                <td>{{ $emp->department->name }}</td>
                                <td>{{ $emp->role->name }}</td>
                            </tr>
                        @endforeach
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('employee_save') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="sel1">User:</label>
                                        <select class="form-control" name="user_id">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="sel1">Department:</label>
                                        <select class="form-control" name="department_id">
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="sel1">Role:</label>
                                        <select class="form-control" name="role_id">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach 
                                        </select>
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
</div>
@endsection
