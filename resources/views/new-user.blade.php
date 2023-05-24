@extends('layouts.master')

@section('title', 'Register User') 

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Create New User</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item">Registration</li>
                    <li class="breadcrumb-item active">Create New User</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<form action="{{ route('daftarUser') }}" method="POST" class="form-horizontal"   enctype="multipart/form-data">
    @csrf
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Create New User</h3>
                    <form>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password <span style="color:red">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span style="color:red">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Alternative_Email" class="form-label">Alternative Email <span style="color:red">*</span></label>
                                    <input type="email" class="form-control" id="Alternative_Email" name="Alternative_Email" placeholder="Enter your alternative email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone <span style="color:red">*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="position" class="form-label">Position</label>
                                    <select name="position" id="position" class="form-select">
                                    <option value="">-Please Select Position-</option>
                                   @foreach ($positions as $m)
                                        <option value="{{$m->description}}" {{$m->id == $m->position? 'selected':''}}>{{$m->description}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="branch" class="form-label">Branch</label>
                                    <select name="branch" id="branch" class="form-control">
                                    <option value="">-Please Select Branch-</option>
                                    @foreach ($branches as $k)
                                        <option value="{{$k->description}}" {{$k->id == $k->branch? 'selected':''}}>{{$k->description}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" class="form-control" id="role" name="role" placeholder="Enter your role">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Activation Status <span style="color:red">*</span></label>
                                    <select name="activation_status" id="activation_status" class="form-control">
                                    <option value="">-Please Select Status-</option>
                                    @foreach ($activation_status as $y)
                                        <option value="{{$y->description}}" {{$y->id == $y->status? 'selected':''}}>{{$y->description}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="float-end">
                            <!-- <input type="submit" value="{{!empty($user->id)?'Kemaskini':'Simpan'}}" class="btn btn-primary"> -->
                            <button type="submit" class="btn btn-success w-md">Save</button>
                            <button type="reset" class="btn btn-secondary w-md">Reset</button>
                            
                        </div>
                    </form>
                </div><!-- end card body -->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</form>
@endsection



