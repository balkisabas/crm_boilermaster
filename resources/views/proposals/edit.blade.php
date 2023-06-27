@extends('layouts.master')

@section('title', 'Edit Proposal') 

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
            <h4 class="mb-sm-0 font-size-18">Edit Proposal</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/index">Home</a></li>
                    <li class="breadcrumb-item">Proposal</li>
                    <li class="breadcrumb-item active">Edit Proposal</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<form action="{{ route('proposals.update', $proposal->id)}}"  method="POST" class="form-horizontal" enctype="multipart/form-data">
@csrf        
@method('PUT')       
@if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Edit Proposal
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
                                    <option value="{{$k->id}}" {{$k->id == $proposal->company? 'selected':''}}>{{$k->company_name}}</option>
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
                                        <option value="{{$p->id}}" {{$p->id == $proposal->pic? 'selected':''}}>{{$p->name}}</option>
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
                                    <option value="{{$m->id}}" {{$m->id == $proposal->type? 'selected':''}}> {{$m->name}} </option>
                                @endforeach
                                </select>
                            </div>
                        </div>                                          
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_name" class="form-label">Customer <span style="color:red">*</span></label>
                                <select id="cust_name" name="cust_name" class="form-control">
                                <option value="">-Please Select Customer-</option>
                                @foreach ($customer as $cust)
                                    <option value="{{$cust->id}}" {{$cust->id == $proposal->cust_name? 'selected':''}}>{{$cust->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_pic" class="form-label">Customer PIC   </label>
                                <select id="cust_pic" name="cust_pic" class="form-control">
                                    <option value="">-Please Select PIC-</option>
                                    @foreach ($pic as $pic)
                                        <option value="{{$pic->id}}" {{$pic->id == $proposal->cust_pic? 'selected':''}}>{{$pic->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                                  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cust_email" class="form-label">Customer Email </label>
                                <input type="email" class="form-control" id="cust_email" name="cust_email" value="{{$proposal->cust_email}}" placeholder="Enter the customer's email">
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rfq_no" class="form-label">RFQ Number</label>
                                <input type="number" class="form-control" id="rfq_no" name="rfq_no" value="{{$proposal->rfq_no}}" placeholder="Enter RFQ number">
                            </div>
                        </div>                                  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rfq_title" class="form-label">RFQ Title</label>
                                <input type="text" class="form-control" id="rfq_title" name="rfq_title" value="{{$proposal->rfq_title}}" placeholder="Enter RFQ tilte">
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="due_date" class="form-label">Due Date</label>
                                <input type="date" class="form-control" id="due_date" name="due_date" value="{{$proposal->due_date}}">
                            </div>
                        </div>                                  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="final_pricing" class="form-label">Final Pricing </label>
                                <input type="number" step="0.01" min="0" class="form-control" id="final_pricing" name="final_pricing" value="{{$proposal->final_pricing}}" placeholder="Enter price (e.g., 0.00)">
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
                                    <option value="{{$n->name}}" {{$n->name == $proposal->rfq_status? 'selected':''}}>{{$n->name}}</option>
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
                                <input type="number" class="form-control" id="cust_po_no" name="cust_po_no" value="{{$proposal->cust_po_no}}" placeholder="Enter customer PO number">
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="date_award" class="form-label">Date Award</label>
                                <input type="date" class="form-control" id="date_award" name="date_award" value="{{$proposal->date_award}}">
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="award_amount" class="form-label">Award Amount</label>
                                <input type="number" step="0.01" min="0" class="form-control" id="award_amount" name="award_amount" value="{{$proposal->award_amount}}" placeholder="Enter price (e.g., 0.00)">
                            </div>  
                        </div> 
                    </div>
                    <hr style="  border: none;  height: 1px; background-color: black;">
                    <div id="textFieldsContainer">
                        
                       @if( $proposalDoc->isEmpty())
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                        <label for="document_name">Document Name hello</label>
                                            <input type="text" class="form-control" id="document_name"  name="data1[]" placeholder="Enter document name">
                                            <input type="hidden" class="form-control" id="doc_id" name="data3[]" value="new">
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
                                            <input type="file" id="files" name="files[]" class="form-control"  >
                                        </div> 
                                    </div> 

                                    <div class="col-sm-1">
                                        <button type="button" name="tmb" id="addTextField" class="btn btn-success w-md" style="margin-top: 27px;">Add</button>
                                    </div>
                                    
                                </div>
                          
                        @else
      
                                @foreach($proposalDoc as $doc)
                                <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="document_name">Document Name  </label>
                                            <input type="text" class="form-control" id="document_name"  name="data1[]" value="{{$doc->document_name}}">
                                            <input type="hidden" class="form-control" id="doc_id" name="data3[]" value="{{ $doc->id}}">
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                        <label for="document_type" class="form-label">Documents Type</label>
                                            <select id="document_type" name="data2[]" class="form-control">
                                                <option value="">-Please Select Document Type-</option>
                                                @foreach ($docs as $k)
                                                    <option value="{{$k->id}}" {{$k->id == $doc->document_type? 'selected':''}}>{{$k->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>  
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="files" class="form-label">Filename</label>
                                            <input type="text" id="files" name="filename[]" class="form-control" value="{{$doc->filename}}">
                                        </div> 
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <label for="" class="form-label">&nbsp;&nbsp;</label>
                                            <input type="file" id="files" name="files[]" class="form-control">
                                        </div> 
                                    </div>
                                    
                                    <div class="col-sm-1">
                                        <a href="{{ route('delete_doc', ['id' => $doc->id, 'rfqid' => $proposal->id]) }}" onclick="return confirm('Are you sure you want to delete  ?')" class="btn btn-warning w-md  col-sm-1 removeTextField" style="margin-top: 27px;"> Remove </a> 
                                    </div>
                                    @if( $loop->index == 0)
                                    <div class="col-sm-1">
                                        <button type="button" name="tmb" id="addTextField" class="btn btn-success w-md" style="margin-top: 27px;">Add</button>
                                    </div>
                                    @endif
                                    
                                </div>
                            @endforeach

                        @endif
                    </div>
                    <br><br>  
                    <div class="float-end">
                    <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure want to update this record?')">Update</button>
                        <a href="{{ route('proposals.index')}}" class="btn btn-secondary">Cancel</a>
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
                                            <input type="hidden" class="form-control" id="doc_id" name="data3[]" value="new">
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                        <label for="document_type" class="form-label">Documents Type<span style="color:red">*</span></label>
                                            <select id="document_type" name="data2[]" class="form-control">
                                                <option value="">-Please Select Document Type-</option>
                                                @foreach ($docs as $k)
                                                    <option value="{{$k->id}}" {{$k->id == $k->name? 'selected':''}}>{{$k->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>  
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="files" class="form-label">File <span style="color:red">*</span></label>
                                            <input type="file" id="files" name="files[]" class="form-control"  >
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

    $('#cust_name').change(function(){
            var id = $(this).val();
            //alert(id); 
            var cust_pic = document.getElementById('cust_pic'); 
            $('#cust_pic').find('option').not(':first').remove();
           
            $.ajax({ 
                url: "{{ url('fetchData') }}/"+id,
                type: 'GET',
                datatype: 'json',
                
                success: function(response){
                     
                    console.log(response );

                    while (cust_pic.options.length > 0) {
                        cust_pic.options[cust_pic   .options.length - 1].remove();
                    } 

                    if(  response.length == 0 ){
                        cust_pic.disabled = false;
                        var option = "<option value='nopiccust'>No PIC In Customer  </option>"; 
                        $("#cust_pic").append(option);
                    }else{
                        cust_pic.disabled = false;
                        $("#cust_pic option[value='nopic']").remove();
                        response.forEach(function(item) {
                        console.log(item.name);
                        var option = "<option value='"+item.id+"'>"+item.name+"</option>"; 
                        $("#cust_pic").append(option); 
                        });
                    }
                    
                }
                
            });
        });

        $('#company').change(function(){
            var id = $(this).val();
           // alert(id); 
            var pic = document.getElementById('pic'); 
            $('#pic').find('option').not(':first').remove();
           
            $.ajax({ 
                url: "{{ url('fetchDatapiccompny') }}/"+id,
                type: 'GET',
                datatype: 'json',
                
                success: function(response){
                     
                    console.log(response.length);
                    
                    while (pic.options.length > 0) {
                        pic.options[pic.options.length - 1].remove();
                    }

                    if(  response.length == 0 ){
                        pic.disabled = false;
                        var option = "<option value='nopic'>No PIC In Selected Company </option>"; 
                        $("#pic").append(option);
                    }else{
                        pic.disabled = false;
                         
                        response.forEach(function(item) {
                        console.log(item.name);
                        var option = "<option value='"+item.id+"'>"+item.name+"</option>"; 
                        $("#pic").append(option); 
                        });
                    }

                     
                }
                
            });
        });
</script>
@endsection
