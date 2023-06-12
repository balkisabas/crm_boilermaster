@extends('layouts.master')

@section('title','Edit Position')

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
@if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3 class="mb-0 font-size-18">Edit Position</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">Edit Position</li>
                </ol>
            </div>
        </div>
    </div>
</div>     
<!-- end page title -->
<form action="{{ route('positions.update', $position->id) }}" method="POST" class="form-horizontal"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Edit Position</h3>
                    <form>
                        <div class="row">  
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$position->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure want to update this record?')">Update</button>
                            <a href="{{ route('positions.index')}}" class="btn btn-secondary">Cancel</a>
                            
                        </div>
                    </form>
                </div><!-- end card body -->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</form>
@endsection

