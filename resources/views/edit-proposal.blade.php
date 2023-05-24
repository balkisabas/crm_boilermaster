@extends('layouts.master')

@section('title', 'Proposal Registration') 

@section('content')
@if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Edit Proposal</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item">Proposal Details</li>
                    <li class="breadcrumb-item active">Edit Proposal</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('updateProposal', $rfqupdate->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Create New RFQ
                    </h3>
                    <form>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="branch" class="form-label">Branch<span style="color:red">*</span></label>
                                    <select id="branch" name="branch" class="form-control" required>
                                    <option value="">-Please Select Branch-</option>
                                    @foreach ($branches as $k)
                                        <option value="{{$k->description}}" {{$k->description ==  $rfqupdate->branch ? 'selected' : ''}}>{{$k->description}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pic" class="form-label">Person In Charge <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="pic" name="pic" value="{{$rfqupdate->pic}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type<span style="color:red">*</span></label>
                                    <select id="type" name="type" class="form-control" required>
                                    <option value="">-Please Select Type-</option>
                                    @foreach ($rfq_type as $m)
                                        <option value="{{$m->description}}" {{$m->description ==  $rfqupdate->type ? 'selected':''}}>{{$m->description}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>                                          
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_name" class="form-label">Customer <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="cust_name" name="cust_name" value="{{$rfqupdate->cust_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_pic" class="form-label">Customer PIC<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="cust_pic" name="cust_pic" value="{{$rfqupdate->cust_pic}}">
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_email" class="form-label">Customer Email <span style="color:red">*</span></label>
                                    <input type="email" class="form-control" id="cust_email" name="cust_email" value="{{$rfqupdate->cust_email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_no" class="form-label">RFQ Number <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="rfq_no" name="rfq_no" value="{{$rfqupdate->rfq_no}}">
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_title" class="form-label">RFQ Title <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="rfq_title" name="rfq_title" value="{{$rfqupdate->rfq_title}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Due Date <span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="due_date" name="due_date" required>
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="final_pricing" class="form-label">Final Pricing <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="final_pricing" name="final_pricing" value="{{$rfqupdate->final_pricing}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_status" class="form-label">Status<span style="color:red">*</span></label>
                                    <select id="rfq_status" name="rfq_status" class="form-control">
                                    <option value="">-Please Select Status-</option>
                                    @foreach ($rfq_status as $n)
                                        <option value="{{$n->description}}" {{$n->description == $rfqupdate->rfq_status? 'selected':''}}>{{$n->description}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_po_no" class="form-label">Customer PO Number <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="cust_po_no" name="cust_po_no" value="{{$rfqupdate->cust_po_no}}">
                                </div>
                            </div>   
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_award" class="form-label">Date Award <span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="date_award" name="date_award" required>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="award_amount" class="form-label">Award Amount <span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="award_amount" name="award_amount" value="{{$rfqupdate->award_amount}}">
                                </div>  
                            </div> 
                            
                        </div>
                    
                        <div class="float-end">
                            <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure want to update this record?')">Update</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="{{ route('proposal-list')}}" class="btn btn-danger">Back</a>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
</form>
@endsection



