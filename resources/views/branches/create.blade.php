@extends('layouts.master') 
@section('title','Create Branch')
@section('content')
           <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">ADD Branch</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item">Branch list</li>
                                <li class="breadcrumb-item">Add Branch</li>
                                
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
                            <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Branch Details
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            </h3>
                            <form action="{{ route('branches.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                                <div class="row">                                            
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="parent_id" name="parent_id" placeholder="Enter your name" value="{{ $data['id']}}"  >

                                            <input type="hidden" class="form-control" id="parent" name="parent" placeholder="Enter your name" value="{{ $page_modual}}"  >
                                        
                                            <label for="title" class="form-label">Branch Name <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter branch name"   required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Phone Number <span style="color:red">*</span></label>
                                            <input type="tel" class="form-control" id="phn_no" name="phn_no"  placeholder="Enter branch mobile phone number" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Address <span style="color:red">*</span></label>
                                            <textarea id="add" name="add"cols="30" rows="3" class="form-control"  placeholder="Enter branch address" required>  </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Email <span style="color:red">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email"   placeholder="Enter branch registration number" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Fax NO  </label>
                                            <input type="number" class="form-control" id="fax_no" name="fax_no"   placeholder="Enter branch fax number"  >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Person In Charge <span style="color:red">*</span></label>
                                            <input type="text" id="pic" name="pic" cols="30" rows="1"  class="form-control" placeholder="Enter The  branch person in Charge" required>
                                        </div>
                                    </div>
                                    
                                </div> 
                                <div class="row">

                                    
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="to" class="form-label">Status </label>
                                             <select   id="active" name="active" class="form-control" >
                                             <option value="Active">Active</option>
                                             <option value="Inactive">Inactive</option>
                                        </select>
                                        </div>
                                    </div>
                                    
                                </div> 
 
                          
                                <div class="float-end">
                                    <button type="submit" class="btn btn-success w-md">ADD</button>

                                </div>
                            </form>
                        </div>
                         
                    </div>
                </div>  
            </div>  
   

        

@endsection 