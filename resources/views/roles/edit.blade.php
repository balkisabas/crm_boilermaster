@extends('layouts.master')

@section('title','Edit Roles')

<style>
    .radio-container {
      display: inline-block;
      margin-right: 40px;
    }
    .checkbox-list {
        column-count: 5;
        column-gap: 10px;
    }
  </style>

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
@if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3 class="mb-0 font-size-18">Edit RFQ</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">Edit Roles</li>
                </ol>
            </div>
        </div>
    </div>
</div>     
<!-- end page title -->
{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Edit Roles</h3>
                    <form>
                        <div class="row">  
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label  class="form-label">Name <span style="color:red">*</span></label>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">  
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label  class="form-label">Permission <span style="color:red">*</span></label>
                                        <br>
                                        <div class="checkbox-list">
                                        @foreach($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                            {{ $value->name }}</label>
                                        <br/>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure want to update this role?')">Update</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
                            
                        </div>
                    </form>
                </div><!-- end card body -->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</form>
{!! Form::close() !!}
@endsection