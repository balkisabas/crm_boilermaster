@extends('layouts.master') 
@section('title', 'Edit Vendor') 
@section('content')
 
 
      
           <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Update {{$page_modual}}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/index">Home</a></li>
                                <li class="breadcrumb-item">{{$page_modual}} list</li>
                                <li class="breadcrumb-item">{{$page_modual}} update</li>
                                <li class="breadcrumb-item active">{{$page_modual}} Infomation</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
           <!--  end page title -->
            
              <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title mb-4 d-flex justify-content-between align-items-center text-capitalize">{{$page_modual}} Details
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            </h3>
                             
                           
                            <form action="{{ route('vendors.update',$vendor['id']) }} "  method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                                <div class="row">                                            
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="cust_id" name="cust_id" placeholder="Enter your name" value="{{ $vendor['id']}}"  >
                                            <input type="hidden" class="form-control" id="assign" name="assign" placeholder="Enter your name" value="{{ $page_modual }}"  >


                                            <label for="title" class="form-label">Name <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ $vendor['name']}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Phone Number <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="ph_no" name="ph_no" value="{{ $vendor['ph_no']}}" placeholder="Enter your mobile phone number" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Address <span style="color:red">*</span></label>
                                            <textarea id="add" name="add"cols="30" rows="3" class="form-control"  placeholder="Enter your address" required> {{ $vendor['add']}} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Company Registration Number <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="reg_no" name="reg_no" value="{{ $vendor['reg_no']}}" placeholder="Enter your registration number" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Website URL </label>
                                            <textarea id="web_url" name="web_url" cols="30" rows="1" class="form-control"   placeholder="Enter your website URL" >{{ $vendor['web_url']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Fax Number  </label>
                                            <input type="number" class="form-control" id="fax_no" name="fax_no" value="{{ $vendor['fax_no']}}" placeholder="Enter your fax number"  >
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Liaise <span style="color:red">*</span></label>
                                            <select id="pic" name="pic" class="form-control">
                                            <option value="">-Please Select PIC-</option>
                                            @foreach ($picUser as $p)
                                                <option value="{{$p->name}}" {{$p->name == $vendor->pic? 'selected':''}}>{{$p->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Email<span style="color:red">*</span></label>
                                            <input type="text" id="email" name="email" cols="30" rows="1" class="form-control" value="{{ $vendor['email']}}" placeholder="Enter email" required>
                                        </div>
                                    </div> 
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Customer Bank Name</label>
                                            <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $vendor['bank_name']}}" placeholder="Enter Bank Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Customer Account Number  </label>
                                            <input type="number" id="bank_acc_no" name="bank_acc_no" cols="30" rows="1" value="{{ $vendor['bank_acc_no']}}" class="form-control" placeholder="Enter Acc no"  >
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Swift Code</label>
                                            <input type="text" class="form-control" id="swift_code" name="swift_code" value="{{ $vendor['swift_code']}}" placeholder="Enter your swift code">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Status {{$vendor['status']}}<span style="color:red">*</span></label>
                                            <select   id="active" name="active" class="form-control" >
                                            <option value="Active" {{ $vendor['status'] == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inctive" {{ $vendor['status'] != 'Active' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        </div>
                                    </div>
                                </div> <hr style="  border: none;  height: 1px; background-color: black;">
                            <label for=""><b> Person in charge</b></label>
                                <div id="textFieldsContainer">
                                @if (count($personic) < 1)
                                
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                        <label for="title" class="form-label">Name <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="data1[]" id="name" placeholder="Enter person in charge's name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                        <label for="title" class="form-label">Phone <span style="color:red">*</span></label>
                                        <input type="tel" class="form-control" id="add" name="data2[]" placeholder="Enter person in charge's mobile phone number" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                        <label for="title" class="form-label">Fax No <span style="color:red">*</span></label>
                                        <input type="tel" class="form-control" id="pic_hp" name="data3[]" placeholder="Enter person in charge's HP" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                        <label for="title" class="form-label">Email <span style="color:red">*</span></label>
                                        <input type="email" class="form-control" id="pic_email" name="data4[]" placeholder="Enter person in charge's email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                        <label for="title" class="form-label">Designation <span style="color:red">*</span></label>
                                        <input type="tel" class="form-control" id="pic_desg"  name="data5[]" placeholder="Enter person in charge's designation" required>                
                                        </div> 
                                    </div>

                                    <div class="col-sm-1">
                                    <button type="button" name="tmb" id="addTextField" class="btn btn-success w-md" style="margin-top: 27px;">Add</button>
                                    </div>

                                </div>

                                @else

                                    @foreach ( $personic as $m)
                                        <div class="row">
                                              
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Name <span style="color:red">*</span></label>
                                             
                                            <input type="text" class="form-control" name="data1[]" id="name" value="{{ $m->name }}"  placeholder="Enter person in charge's name"  >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Phone <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="add" name="data2[]" value="{{ $m->phn_no }}" placeholder="Enter person in charge's mobile phone number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Fax No  </label>
                                            <input type="tel" class="form-control" id="pic_hp" name="data3[]"value="{{ $m->fax_no }}"  placeholder="Enter person fax no"  >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Email <span style="color:red">*</span></label>
                                            <input type="email" class="form-control" id="pic_email" name="data4[]" value="{{ $m->email }}" placeholder="Enter person in charge's email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Designation  </label>
                                            <input type="tel" class="form-control" id="pic_desg"  name="data5[]"  value="{{ $m->Designation }}"placeholder="Enter person in charge's designation"  > 
                                            <input type="hidden" class="form-control" id="pic_id" name="data6[]" placeholder="Enter your name" value="{{ $m['id']}}"   >               
                                            </div> 
                                        </div>

                                            @php 
                                            $count = $loop->index + 1
                                            @endphp

                                            @if ( $count  > 1)
                                                <div class="col-sm-1">
                                                    <a href=  "{{ route('delete_pic_'.$page_modual, ['id' => $m->id, 'page_modual' => $page_modual, 'parent_id' => $vendor['id'] ]) }}" onclick="return confirm('Are you sure you want to delete  ?')" class="btn btn-warning w-md  col-sm-1 removeTextField" style="margin-top: 27px;"> Remove </a> 
                                                </div>
                                            @else
                                                <div class="col-sm-1">
                                                    <button type="button" name="tmb" id="addTextField" class="btn btn-success w-md" style="margin-top: 27px;">Add</button>
                                                </div>
    
                                            @endif
                                        

                                    </div>
                                    @endforeach
                                @endif
                                </div>
                                <hr style="  border: none;  height: 1px; background-color: black;">
                                 <div class="row">
                                    <hr>
                                    <label for=""><b>Customer References</b></label>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Document <span style="color:red"> </span></label>
                                            <input type="text" class="form-control" id="doc"  value="{{ $vendor['doc']}}" name="doc" ><br>
                                            <input type="file" class="form-control" id="doc"  value="{{ $vendor['doc']}}" name="doc" >
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="float-end">
                                    <button type="submit" class="btn btn-success w-md">Save</button>
                                </div>
                            </form>
                        </div>
                         
                    </div>
                </div>  
            </div>  
   

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



            <script>
                $(document).ready(function() {
                    // Add new text field
                    $('#addTextField').click(function() {
                        var newTextField = $(`  <div class="row">
                                                <div class="col-md-2">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Name <span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" name="data1[]" id="name" placeholder="Enter person in charge's name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Phone <span style="color:red">*</span></label>
                                                        <input type="tel" class="form-control" id="add" name="data2[]" placeholder="Enter person in charge's mobile phone number" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Fax No </label>
                                                        <input type="tel" class="form-control" id="pic_hp" name="data3[]" placeholder="Enter person fax no"  >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Email <span style="color:red">*</span></label>
                                                        <input type="email" class="form-control" id="pic_email" name="data4[]" placeholder="Enter person in charge's email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Designation </label>
                                                        <input type="tel" class="form-control" id="pic_desg"  name="data5[]" placeholder="Enter person in charge's designation"  >
                                                        <input type="hidden" class="form-control" id="pic_id" name="data6[]" placeholder="Enter your name" value="new"   >  
                                                        
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