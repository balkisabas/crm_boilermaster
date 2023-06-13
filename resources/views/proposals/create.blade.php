@extends('layouts.master')

@section('title', 'Proposal Registration') 

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
                <h4 class="mb-sm-0 font-size-18">Create New Proposal</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/index">Home</a></li>
                        <li class="breadcrumb-item">Proposal</li>
                        <li class="breadcrumb-item active">Create New Proposal</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{ route('proposals.store') }}" method="POST" class="form-horizontal"   enctype="multipart/form-data">
    @csrf               
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Create New Proposal
                        <a class="btn btn-primary" href="{{ route('proposals.index') }}"><i class="bx bx-arrow-back"></i> Back</a>
                    </h3>
                    <form>
                        <div class="row">                                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company" class="form-label">Company<span style="color:red">*</span></label>
                                    <select id="company" name="company" class="form-control">
                                    <option value="">-Please Select Company-</option>
                                    @foreach ($company as $k)
                                        <option value="{{$k->company_name}}" {{$k->id == $k->company_name? 'selected':''}}>{{$k->company_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pic" class="form-label">Person In Charge <span style="color:red">*</span></label>
                                    <select id="pic" name="pic" class="form-control">
                                    <option value="">-Please Select PIC-</option>
                                    @foreach ($picUser as $p)
                                        <option value="{{$p->name}}" {{$p->name == $p->pic? 'selected':''}}>{{$p->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type<span style="color:red">*</span></label>
                                    <select id="type" name="type" class="form-control">
                                    <option value="">-Please Select Type-</option>
                                    @foreach ($rfq_type as $m)
                                        <option value="{{$m->name}}" {{$m->id == $m->name? 'selected':''}}>{{$m->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>                                          
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_name" class="form-label">Customer <span style="color:red">*</span></label>
                                    <select id="cust_name" name="cust_name" class="form-control">
                                    <option value="">-Please Select Customer-</option>
                                    @foreach ($customer as $customer)
                                        <option value="{{$customer->name}}" {{$customer->id == $customer->name? 'selected':''}}>{{$customer->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_pic" class="form-label">Customer PIC</label>
                                    <select id="cust_pic" name="cust_pic" class="form-control">
                                    <option value="">-Please Select PIC-</option>
                                    @foreach ($pic as $pic)
                                        <option value="{{$pic->name}}" {{$pic->name == $pic->cust_pic? 'selected':''}}>{{$pic->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cust_email" class="form-label">Customer Email </label>
                                    <input type="email" class="form-control" id="cust_email" name="cust_email" placeholder="Enter the customer's email">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_no" class="form-label">RFQ Number</label>
                                    <input type="number" class="form-control" id="rfq_no" name="rfq_no" placeholder="Enter RFQ number">
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_title" class="form-label">RFQ Title</label>
                                    <input type="text" class="form-control" id="rfq_title" name="rfq_title" placeholder="Enter RFQ tilte">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="due_date" class="form-label">Due Date</label>
                                    <input type="date" class="form-control" id="due_date" name="due_date">
                                </div>
                            </div>                                  
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="final_pricing" class="form-label">Final Pricing (RM) </label>
                                    <input type="number" step="0.01" min="0"  class="form-control" id="final_pricing" name="final_pricing" placeholder="Enter price (e.g., 0.00)">
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rfq_status" class="form-label">Status</label>
                                    <select id="rfq_status" name="rfq_status" class="form-control">
                                    <option value="">-Please Select Status-</option>
                                    @foreach ($rfq_status as $n)
                                        <option value="{{$n->name}}" {{$n->id == $n->name? 'selected':''}}>{{$n->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr style="  border: none;  height: 1px; background-color: black;">
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="cust_po_no" class="form-label">Customer PO Number</label>
                                    <input type="number" class="form-control" id="cust_po_no" name="cust_po_no" placeholder="Enter customer PO number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="date_award" class="form-label">Date Award</label>
                                    <input type="date" class="form-control" id="date_award" name="date_award">
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="award_amount" class="form-label">Award Amount</label>
                                    <input type="number" step="0.01" min="0"  class="form-control" id="award_amount" name="award_amount" placeholder="Enter price (e.g., 0.00)">
                                </div>  
                            </div> 
                        </div>
                        <hr style="  border: none;  height: 1px; background-color: black;">
                        <div id="textFieldsContainer">
                            <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="document_name">Document Name</label>
                                        <input type="text" class="form-control" id="document_name"  name="data1[]" placeholder="Enter document name">
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="mb-3">
                                    <label for="document_type" class="form-label">Documents Type</label>
                                        <select id="document_type" name="data2[]" class="form-control">
                                            <option value="">-Please Select Document Type-</option>
                                            @foreach ($docs as $k)
                                                <option value="{{$k->name}}" {{$k->id == $k->name? 'selected':''}}>{{$k->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>  
                                </div> 
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="files" class="form-label">File <span style="color:red">*</span></label>
                                        <input type="file" id="files" name="files[]" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" name="tmb" id="addTextField" class="btn btn-success w-md" style="margin-top: 27px;">Add</button>
                                </div>
                            </div>
                        </div>
                        <br><br>  
                        <div class="float-end">
                            <button type="submit" class="btn btn-success w-md">Save</button>
                            <button type="reset" class="btn btn-secondary w-md">Reset</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    $(document).ready(function() {
        // Add new text field
        $('#addTextField').click(function() {
            var newTextField = $(`  <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                            <label for="document_name">Document Name</label>
                                                <input type="text" class="form-control" id="document_name"  name="data1[]" placeholder="Enter document name">
                                            </div>
                                        </div> 
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                            <label for="document_type" class="form-label">Documents Type<span style="color:red">*</span></label>
                                                <select id="document_type" name="data2[]" class="form-control">
                                                    <option value="">-Please Select Document Type-</option>
                                                    @foreach ($docs as $k)
                                                        <option value="{{$k->name}}" {{$k->id == $k->name? 'selected':''}}>{{$k->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>  
                                        </div> 
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="files" class="form-label">File <span style="color:red">*</span></label>
                                                <input type="file" id="files" name="files[]" class="form-control">
                                            </div> 
                                        </div> 
                                        <div class="col-sm-1">
                                            <button type="button" name="tmb" id="addTextField" class="btn btn-warning w-md  col-sm-1 removeTextField" style="margin-top: 27px;">Remove</button>
                                         </div>
                                    </div> `);
            $('#textFieldsContainer').append(newTextField);
        });

        // Remove text field
        $(document).on('click', '.removeTextField', function() {
            var button = event.target; // Get the button element
            var parentDiv = button.parentNode; // Get the parent div
            var grandParentDiv = parentDiv.parentNode; // Get the grandparent div

            grandParentDiv.remove();


        });
    });
</script>
@endsection
