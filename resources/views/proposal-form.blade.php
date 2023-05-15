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
                                    <h4 class="mb-sm-0 font-size-18">Create New RFQ</h4>
            
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item">RFQ</li>
                                            <li class="breadcrumb-item active">Create New RFQ</li>
                                        </ol>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
            
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
                                                        <label for="from" class="form-label">Branch<span style="color:red">*</span></label>
                                                        <select name="company" id="company" class="form-control" required>
                                                            <option value="" disabled selected hidden>Select Branch</option>
                                                            <option value="">Labuan</option>
                                                            <option value="">Shah Alam</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">Person In Charge <span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" id="pic" placeholder="Enter the person in charge's name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">  
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">Type<span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" id="type" placeholder="Enter type" required>
                                                    </div>
                                                </div>                                          
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">Customer <span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" id="cust" placeholder="Enter the customer's name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">   
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">Customer PIC<span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" id="cust_pic" placeholder="Enter customer PIC" required>
                                                    </div>
                                                </div>                                  
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">Customer Email <span style="color:red">*</span></label>
                                                        <input type="email" class="form-control" id="cust_email" placeholder="Enter the customer's email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">   
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">RFQ Number <span style="color:red">*</span></label>
                                                        <input type="number" class="form-control" id="rfq_num" placeholder="Enter RFQ number" required>
                                                    </div>
                                                </div>                                  
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">RFQ Title <span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" id="rfq_title" placeholder="Enter RFQ tilte" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">   
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">Due Date <span style="color:red">*</span></label>
                                                        <input type="date" class="form-control" id="due_date" required>
                                                    </div>
                                                </div>                                  
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">Final Pricing <span style="color:red">*</span></label>
                                                        <input type="number" class="form-control" id="final_pricing" placeholder="Enter final pricing" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">   
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">Status<span style="color:red">*</span></label>
                                                        <select name="company" id="company" class="form-control" required>
                                                            <option value="" disabled selected hidden>Select Status</option>
                                                            <option value="">Submitted</option>
                                                            <option value="">Decline</option>
                                                            <option value="">Awarded</option>
                                                            <option value="">In-Progress</option>
                                                            <option value="">Customer Review</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">Customer PO Number <span style="color:red">*</span></label>
                                                        <input type="number" class="form-control" id="cust_po_num" placeholder="Enter customer PO number" required>
                                                    </div>
                                                </div>   
                                            </div>
                                            <div class="row"> 
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">Date Award <span style="color:red">*</span></label>
                                                        <input type="date" class="form-control" id="date_award"  required>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="from" class="form-label">Award Amount <span style="color:red">*</span></label>
                                                        <input type="number" class="form-control" id="award_amt" placeholder="Enter award amount" required>
                                                    </div>  
                                                </div> 
                                            </div>
                                            <table id="datatable" class="table table-striped dataTable no-footer nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Document Name</th>
                                                        <th>Document Type</th>
                                                        <th>File</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" class="form-control" id="doc_name" name="doc_name" placeholder="Enter document name" required></td>
                                                        <td><select name="doc_type" id="doc_type" class="form-control" required>
                                                            <option value="" disabled selected hidden>Select Document Type</option>
                                                            <option value="">Tender Document</option>
                                                            <option value="">Submission Document</option>
                                                            <option value="">Final Quotation</option>
                                                            <option value="">Customer PO</option>
                                                            <option value="">Costing Sheet</option>
                                                            <option value="">Supplier Quptation</option>
                                                            <option value="">Supporting Document</option>
                                                            <option value="">Contact</option>
                                                        </select></td>
                                                        <td><input type="file" class="form-control" id="filename" name="filename"  required></td>
                                                        <td><button type="submit" class="btn btn-success w-md">Add</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table id="datatable1" class="table table-striped dataTable no-footer nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Document Name</th>
                                                        <th>Document Type</th>
                                                        <th>File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Sample document 1</td>
                                                        <td>Tender Document</td>
                                                        <td>Sample1.pdf</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Sample document 2</td>
                                                        <td>Tender Document</td>
                                                        <td>Sample2.pdf</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Sample document 3</td>
                                                        <td>Submission Document</td>
                                                        <td>Sample3.pdf</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="float-end">
                                                <button type="submit" class="btn btn-success w-md">Add</button>
                                                <button type="reset" class="btn btn-danger w-md">Delete</button>
                                                
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

@endsection



