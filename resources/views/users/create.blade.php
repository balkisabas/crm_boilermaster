@extends('layouts.master')

@section('title', 'Register User') 

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endsection

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
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3 class="mb-0 font-size-18">Create New User</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">Create New User</li>
                </ol>
            </div>
        </div>
    </div>
</div>     
<!-- end page title -->
{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Create New User
                        <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="bx bx-arrow-back"></i> Back</a>
                    </h3>
                    <form>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                </div>
                            </div>
                        </div>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alternative_email" class="form-label">Alternative Email </label>
                                    <input type="text" class="form-control" id="alternative_email" name="alternative_email" placeholder="Enter alternative email">
                                </div>
                            </div>
                        </div>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="position" class="form-label">Position </label>
                                    <select name="position" id="position" class="form-control">
                                        <option value="">-Please Select position-</option>
                                        @foreach ($position as $m)
                                        <option value="{{$m->id}}" {{$m->id == $m->position? 'selected':''}}>{{$m->name}}({{$m->id}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company" class="form-label">Company </label>
                                    <select name="company" id="company" class="form-control">
                                    <option value="">-Please Select company-</option>
                                        @foreach ($company as $k)
                                        <option value="{{$k->id}}" {{$k->id == $k->company? 'selected':''}}>{{$k->company_name}}($k->id)</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="roles" class="form-label">Role <span style="color:red">*</span></label>
                                    <select class="selectpicker form-control" multiple data-live-search="true" name="roles[]">
                                        @foreach ($roles as $role)
                                        <option value="{{$role->name}}" {{$role->name == $role->role? 'selected':''}}>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio-container">
                                        <label for="status" class="form-label">Status</label>
                                        <br>
                                        <input type="radio" style="margin-top:10px" name="status" value="Yes">Yes
                                        <input type="radio"  name="status"  value="No">No
                                    </div>
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="code" class="form-label">Zoho email permission code</label>
                                    <input type="text" class="form-control" id="zohoemail_code" name="zohoemail_code" placeholder="Enter code">
                                </div>
                                <div class="mb-3" hidden>
                                <div class="radio-container">
                                    <label for="status" class="form-label">Account Mail Type</label>
                                    <br>
                                    <input type="radio" style="margin-top:10px" name="account" value="zoho">Zoho Mail
                                    <input type="radio"  name="account"  value="default">Default Mail
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <button type="submit" class="btn btn-success w-md">Save</button>
                            <button type="reset" class="btn btn-secondary w-md">Reset</button>
                            
                        </div>
                    </form>
                </div><!-- end card body -->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
{!! Form::close() !!}
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
@endsection



