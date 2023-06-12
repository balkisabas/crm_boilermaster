@extends('layouts.master')
@section('title','Create RFQ Status')
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
            <h3 class="mb-0 font-size-18">Create RFQ Status</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">Create RFQ Status</li>
                </ol>
            </div>
        </div>
    </div>
</div>     
<!-- end page title -->
<form action="{{ route('rfqstatus.store') }}" method="POST" class="form-horizontal"  enctype="multipart/form-data">
    @csrf
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Create RFQ Status
                        <a href="{{ route('rfqstatus.index')}}" class="btn btn-primary"> <i class="bx bx-arrow-back"></i> Back</a>
                    </h3>
                    <form>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="code" class="form-label">Code <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="code" name="code" placeholder="Enter rfq status code">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter rfq status">
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
</form>
@endsection

