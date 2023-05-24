@extends('layouts.master')

@section('title', 'Edit User') 

@section('content')
@if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Edit User</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item">User Details</li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
<form action="{{ route('update', $user->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Update User Details</h3>
                    <form>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password <span style="color:red">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span style="color:red">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Alternative_Email" class="form-label">Alternative Email <span style="color:red">*</span></label>
                                    <input type="email" class="form-control" id="Alternative_Email" name="Alternative_Email" value="{{$user->alternative_email}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone <span style="color:red">*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="position" name="position" value="{{$user->position}}">
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="branch" class="form-label">Branch</label>
                                    <input type="text" class="form-control" id="branch" name="branch" value="{{$user->branch}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" class="form-control" id="role" name="role" value="{{$user->role}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Activation Status <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="activation_status" name="activation_status" value="{{$user->activation_status}}">
                                </div>
                            </div>
                        </div>

                        <div class="float-end">
                            <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure want to update this record?')">Update User</button>
                            <a href="{{ route('senaraiUser')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div><!-- end card body -->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</form>
@endsection


