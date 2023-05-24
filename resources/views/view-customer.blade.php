@extends('layouts.master') 
@section('content')
 
 
      
           <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">View {{$page_modual}}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
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
                            <form action="/edit-customer" method="POST" enctype="multipart/form-data">
                              @csrf
                                <div class="row">                                            
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter your name" value="{{ $customer['id']}}"  readonly>
                                        
                                             <label for="title" class="form-label">Name <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ $customer['name']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Phone Number <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="ph_no" name="ph_no" value="{{ $customer['ph_no']}}" placeholder="Enter your mobile phone number" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Address <span style="color:red">*</span></label>
                                            <textarea id="add" name="add"cols="30" rows="3" class="form-control"  placeholder="Enter your address" readonly> {{ $customer['add']}} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Registration Number <span style="color:red">*</span></label>
                                            <input type="number" class="form-control" id="reg_no" name="reg_no" value="{{ $customer['reg_no']}}" placeholder="Enter your registration number" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Website URL <span style="color:red">*</span></label>
                                            <textarea id="web_url" name="web_url" cols="30" rows="1" class="form-control"   placeholder="Enter your website URL" readonly>{{ $customer['web_url']}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Fax Number <span style="color:red">*</span></label>
                                            <input type="number" class="form-control" id="fax_no" name="fax_no" value="{{ $customer['fax_no']}}" placeholder="Enter your fax number" readonly>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Person In Charge <span style="color:red">*</span></label>
                                            <input type="text" id="pic" name="pic" cols="30" rows="1" value="{{ $customer['pic']}}"class="form-control" placeholder="Enter The person in Charge" readonly>
                                        </div>
                                    </div>
                                    
                                </div> 
                               
                                    
                                 
                                
                            <label for=""><b> Person in charge</b></label>
                                <div id="textFieldsContainer">
                                

                                    @foreach ( $personic as $m)
                                        <div class="row">
                                            @php 
                                            $count = $loop->index + 1
                                            @endphp
                                            
                                         <div class="col-sm-1">
                                             <button type="button" name="tmb" id="addTextField" class="btn btn-warning w-md  col-sm-1  " style="margin-top: 27px;">PIC {{  $count}}</button>
                                         </div>

                                             <input type="hidden" class="form-control" id="pic_id" name="pic_id" placeholder="Enter your name" value="{{ $m['id']}}"  >
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Name <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" name="data1[]" id="name" value="{{ $m->name }}"  placeholder="Enter person in charge's name" readonly >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Phone <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="add" name="data2[]" value="{{ $m->phn_no }}" placeholder="Enter person in charge's mobile phone number" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Fax No <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="pic_hp" name="data3[]"value="{{ $m->fax_no }}"  placeholder="Enter person in charge's HP" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Email <span style="color:red">*</span></label>
                                            <input type="email" class="form-control" id="pic_email" name="data4[]" value="{{ $m->email }}" placeholder="Enter person in charge's email" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                            <label for="title" class="form-label">Designation <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="pic_desg"  name="data5[]"  value="{{ $m->Designation }}"placeholder="Enter person in charge's designation" readonly>                
                                            </div> 
                                        </div>

                                            
                                             

                                    </div>
                                    @endforeach
                                  </div>





                                 <div class="row">
                                    <label for=""><b>Customer References</b></label>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Document <span style="color:red"> </span></label>
                                            <input type="text" class="form-control" id="doc"  value="{{ $customer['doc']}}" name="doc" readonly><br>
                                            
                                            
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="float-end">
                                    <a href="{{ route('Edit_view_'.$page_modual, ['id' => $customer->id, 'page_modual' => $page_modual]) }}" class="btn btn-success w-md">Edit</a>

                                </div>
                            </form>
                        </div>
                         
                    </div>
                </div>  
            </div>  
   
@endsection 