@extends('layouts.master') 
@section('title','View Customer')
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
                                            @if (isset($customer['name']))  
                                                <td> : {{ $customer['name'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Phone Number</th>     
                                            @if (isset($customer['ph_no']))  
                                                <td> : {{ $customer['ph_no'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable"> Address</th> 
                                            @if (isset($customer['add']))  
                                                <td> : {{ $customer['add'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Registration Number</th> 
                                            @if (isset($customer['reg_no']))  
                                                <td> : {{ $customer['reg_no'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            @php  $pic = DB::table('Users')->where('id', '=',  $customer['pic'])->first(); @endphp
                                            <th class="widthtable">Liaise</th> 
                                            @if (isset($customer['pic']))  
                                                <td> : {{ $pic->name }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Web URL </th> 
                                            @if (isset($customer['web_url']))  
                                                <td> : {{ $customer['web_url'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Fax No</th> 
                                            @if (isset($customer['fax_no']))  
                                                <td> : {{ $customer['fax_no'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Email </th> 
                                            @if (isset($customer['email']))  
                                                <td> : {{ $customer['email'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Bank Name</th> 
                                            @if (isset($customer['bank_name']))  
                                                <td> : {{ $customer['bank_name'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Bank Account Number</th> 
                                            @if (isset($customer['bank_acc_no']))  
                                                <td> : {{ $customer['bank_acc_no'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Swift Code</th> 
                                            @if (isset($customer['swift_code']))  
                                                <td> : {{ $customer['swift_code'] }}</td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        <tr>
                                            <th class="widthtable">Attached Document</th> 
                                            @if (isset($customer['doc']))    
                                                <td> : {{ $customer['doc'] }} &nbsp;&nbsp;<a href="{{ asset('doc_upload/' . $customer['doc']) }}" class="btn btn-info btn-sm"> Download File </a></td>
                                            @else 
                                                <td> :  -</td>
                                            @endif
                                        </tr> 
                                        
                                         
                                        <tr>
                                        <th class="widthtable">Status</th> 
                                            @if (isset($customer['status']))    
                                                    @if($customer['status'] == "Active") 
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