@extends('layouts.master')

@section('title','Create New Company')

<style>
    .radio-container {
      display: inline-block;
      margin-right: 40px;
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
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3 class="mb-0 font-size-18">Create New Company</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">Create New Company</li>
                </ol>
            </div>
        </div>
    </div>
</div>     
<!-- end page title -->
<form action="{{ route('companies.store') }}" method="POST" class="form-horizontal"  enctype="multipart/form-data">
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
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Create New Company
                        <a class="btn btn-primary" href="{{ route('companies.index') }}"><i class="bx bx-arrow-back"></i> Back</a>
                    </h3>
                    <form>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter your company name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone <span style="color:red">*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                                </div>
                            </div>
                        </div>

                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address <span style="color:red">*</span></label>
                                    <textarea type="text" class="form-control" id="address" name="address" placeholder="Enter address"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fax" class="form-label">Fax </label>
                                    <input type="text" class="form-control" id="fax" name="fax" placeholder="Enter fax label">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="radio-container">
                                <label for="status" class="form-label">Status <span style="color:red">*</span></label>
                                <br>
                                <input type="radio" class="form-check-input"  name="status" value="Yes">Yes
                                <input type="radio" class="form-check-input"  name="status"  value="No">No
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
</form>
@endsection

