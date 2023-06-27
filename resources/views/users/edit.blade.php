@extends('layouts.master')

@section('title','Edit User')
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endsection
@section('content')
<style>
    .accordion-item {
      
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 13px;
        transition: 0.4s;
    }

    .accordion-header {
        background-color: #f1f1f1;
        padding: 10px;
        cursor: pointer;
    }

    .accordion-content {
        padding: 10px;
        display: none;
        background-color: white; 
    }
</style>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3 class="mb-0 font-size-18">Edit User</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div>
        </div>
    </div>
</div>     
<!-- end page title -->
{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Edit User
                        <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="bx bx-arrow-back"></i> Back</a>
                    </h3>
                    <form>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span style="color:red">*</span></label>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span style="color:red">*</span></label>
                                    {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alternative_email" class="form-label">Alternative Email</label>
                                    {!! Form::text('alternative_email', null, array('placeholder' => 'alternative_email','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone <span style="color:red">*</span></label>
                                    {!! Form::text('phone', null, array('placeholder' => 'phone','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="position" class="form-label">Position <span style="color:red">*</span></label>
                                    <select name="position" id="position" class="form-control">
                                        <option value="">-Please Select position-</option>
                                        @foreach ($position as $m)
                                        <option value="{{$m->id}}" {{$m->id == $user->position ? 'selected':''}}>{{$m->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company" class="form-label">Company <span style="color:red">*</span></label>
                                    <select name="company" id="company" class="form-control">
                                    <option value="">-Please Select company-</option>
                                    @foreach ($company as $k)
                                    <option value="{{$k->id}}" {{$k->id == $user->company? 'selected':''}}>{{$k->company_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="roles" class="form-label">Role <span style="color:red">*</span></label>
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'selectpicker form-control','multiple')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="radio-container">
                                    <label for="status" class="form-label">Activation Status</label>
                                    <br>
                                    <input type="radio" style="margin-top:10px" name="status" value="Yes" {{ $user->status == 'Yes' ? 'checked' : '' }}> Yes
                                    <input type="radio"  name="status"  value="No" {{ $user->status == 'No' ? 'checked' : '' }}>No
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="mb-3" hidden>
                                        <label for="code" class="form-label">Zoho email permission code</label>
                                        <input type="text" class="form-control" id="zohoemail_code" name="zohoemail_code" value="{{$user->zohoemail_code}}">
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
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.accordion-header').click(function() {
                $(this).toggleClass('active');
                $(this).next('.accordion-content').slideToggle();
            });
        });
    </script>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
@endsection