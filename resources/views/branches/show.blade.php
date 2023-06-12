@extends('layouts.master') 
@section('content')
 
 
      
           <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Update Branch</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item">Branch list</li>
                                <li class="breadcrumb-item">Branch update</li>
                                
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
                            <table class="table table-striped">
                                <thead> 
                                    <tr>
                                        <th class="widthtable">Branch Name </th>
                                        @if (isset($branch['name']))  
                                            <td> : {{ $branch['name'] }}</td>
                                        @else 
                                            <td> :  -</td>
                                        @endif
                                    </tr> 
                                    <tr>
                                        <th class="widthtable">Phone Number</th>     
                                        @if (isset($branch['phn_no']))  
                                            <td> : {{ $branch['phn_no'] }}</td>
                                        @else 
                                            <td> :  -</td>
                                        @endif
                                    </tr> 
                                    <tr>
                                        <th class="widthtable"> Address</th> 
                                        @if (isset($branch['add']))  
                                            <td> : {{ $branch['add'] }}</td>
                                        @else 
                                            <td> :  -</td>
                                        @endif
                                    </tr> 
                                    <tr>
                                        <th class="widthtable">Email</th> 
                                        @if (isset($branch['email']))  
                                            <td> : {{ $branch['email'] }}</td>
                                        @else 
                                            <td> :  -</td>
                                        @endif
                                    </tr> 
                                    <tr>
                                        <th class="widthtable">Fax No</th> 
                                        @if (isset($branch['fax_no']))  
                                            <td> : {{ $branch['fax_no'] }}</td>
                                        @else 
                                            <td> :  -</td>
                                        
                                        @endif
                                    </tr> 
                                    <tr>
                                        <th class="widthtable">Person In Charge</th> 
                                        @if (isset($branch['pic']))  
                                            <td> : {{ $branch['pic'] }}</td>
                                        @else 
                                            <td> :  -</td>
                                        @endif
                                    </tr> 
                                    
                                    <th class="widthtable">Status</th> 
                                    @if (isset($branch['status']))    
                                            @if($branch['status'] == "Active") 
                                                <td>:  <span class="badge bg-success fs-6"> Active</span></td> </td> 
                                            @else 
                                                <td>:  <span class="badge bg-danger fs-6"> Inactive</span></td> </td> 
                                            @endif 
                                    @else 
                                        <td> :  -</td>
                                    @endif
                                </tr> 
                                     
                                     
                                     
                                    
                                </thead>
                            </table>
                                     
                        </div>
                         
                    </div>
                </div>  
            </div>  
   

        

@endsection 
 
                          
                  