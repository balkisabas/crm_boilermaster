@extends('layouts.master') 
@section('title','View Vendor')
@section('content')
 
 
      
           <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{$page_modual}}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item">{{$page_modual}} list</li> 
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
                                <table class="table table-striped">
                                    <thead> 
                                        <tr>
                                            <th class="widthtable">Customer Name </th>
                                            @if (isset($vendor['name']))  
                                                <td> : {{ $vendor['name'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Phone Number</th>     
                                            @if (isset($vendor['ph_no']))  
                                                <td> : {{ $vendor['ph_no'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable"> Address</th> 
                                            @if (isset($vendor['add']))  
                                                <td> : {{ $vendor['add'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Registration Number</th> 
                                            @if (isset($vendor['reg_no']))  
                                                <td> : {{ $vendor['reg_no'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Liaise</th> 
                                            @if (isset($vendor['pic']))  
                                                <td> : {{ $vendor['pic'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Web URL </th> 
                                            @if (isset($vendor['web_url']))  
                                                <td> : {{ $vendor['web_url'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Fax No</th> 
                                            @if (isset($vendor['fax_no']))  
                                                <td> : {{ $vendor['fax_no'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Email</th> 
                                            @if (isset($vendor['email']))  
                                                <td> : {{ $vendor['email'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Bank Name</th> 
                                            @if (isset($vendor['bank_name']))  
                                                <td> : {{ $vendor['bank_name'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Bank Account Number</th> 
                                            @if (isset($vendor['bank_acc_no']))  
                                                <td> : {{ $vendor['bank_acc_no'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Swift Code</th> 
                                            @if (isset($vendor['swift_code']))  
                                                <td> : {{ $vendor['swift_code'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Attached Document</th> 
                                            @if (isset($vendor['doc']))    
                                                <td> : {{ $vendor['doc'] }} &nbsp;&nbsp;<a href="{{ asset('doc_upload/' . $vendor['doc']) }}" class="btn btn-info btn-sm"> Download File </a></td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        
                                         
                                        <tr>
                                        <th class="widthtable">Status</th> 
                                            @if (isset($vendor['status']))    
                                                    @if($vendor['status'] == "Active") 
                                                        <td>:  <span class="badge bg-success fs-6"> Active</span></td> </td> 
                                                    @else 
                                                        <td>:  <span class="badge bg-danger fs-6"> Inactive</span></td> </td> 
                                                    @endif 
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 


                                        <tr ><td ><strong>Person In Chanrge Details :</strong></td></tr>
                                        @foreach ($personic as $p)
                                        <tr>
                                            <td><li><strong> PIC Name:</strong>@if (isset($p->name)){{ $p->name }}@else - @endif</li>
                                            <li><strong> PIC Phone number:</strong>@if (isset($p->phn_no))  {{ $p->phn_no }}@else - @endif</li>
                                            <li><strong> PIC Fax No:</strong>@if (isset($p->fax_no))  {{ $p->fax_no }}@else - @endif</li>
                                            <li><strong> PIC Email:</strong>@if (isset($p->email))  {{ $p->email }}@else - @endif</li>
                                            <li><strong> PIC Designation:</strong>@if (isset($p->Designation))  {{ $p->Designation }}@else - @endif</li>
                                        
                                        </td> 
                                        </tr> 
                                        @endforeach 
                                        
                                    </thead>
                                </table>
                          
                        </div>
                         
                    </div>
                </div>  
            </div>  
   
@endsection 