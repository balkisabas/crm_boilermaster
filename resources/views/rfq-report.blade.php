@extends('layouts.master')
@section('title', 'Proposal Listing') 
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">RFQ REPORT</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">RFQ Report</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<script>
function filtertype() {
var selectedOption = document.getElementById("dataDropdown").value;

// Redirect to the route with the selected option
window.location.href = "{{ route('rfqreport') }}?option=" + selectedOption;
}
function filterdata() {
var selectedOption = document.getElementById("dataDropdown").value;
var datefrom = document.getElementById("date_from").value;
var dateto = document.getElementById("date_to").value;
var value = selectedOption+'/'+datefrom+'/'+dateto;
    


if(datefrom && dateto){
window.location.href = "{{ route('rfqreportfilter') }}?option=" + value ;
    
}else if(datefrom){

var newTextField =  $(`<div class="alert alert-warning">Please Select Year To to filter data</div> `);
                    $('#textFieldsContainer').append(newTextField);
}else if (dateto){

var newTextField =  $(`<div class="alert alert-warning">Please Select Year From to filter data</div> `);
                    $('#textFieldsContainer').append(newTextField); 
}else if(selectedOption){
  window.location.href = "{{ route('rfqreport') }}?option=" + selectedOption;   
}else{

}
}
</script>

<div id="textFieldsContainer">
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">                                            
                    <div class="col-md-1">
                         
                        <label for="title" class="form-label">View By :</label>
                        
                        <select id="dataDropdown"  class="form-control"  >

                                @if(isset($selectedOption)) 

                                    @if($selectedOption == "PIC")
                                    <option value="CLIENT"  >CLIENT </option>
                                    <option value="PIC" selected>PIC</option>
                                    @else
                                    <option value="CLIENT" selected>CLIENT </option>
                                    <option value="PIC">PIC</option>
                                    @endif

                                @else 
                                     
                                    <option value="CLIENT" selected>CLIENT </option>
                                    <option value="PIC">PIC</option>

                                @endif
                                    
                            </select>
                        
                    </div>

                                                   
                    <div class="col-md-2">
                        <label for="title" class="form-label">Year From  :</label>
                        @if(isset($datefrom)) 
 
                        <input type="date" class="form-control" id="date_from" name="datefrom" value="{{$datefrom}}">

                        @else
                        <input type="date" class="form-control" id="date_from" name="datefrom">

                        @endif
                    </div>
          

                                                      
                    <div class="col-md-2">
                        <label for="title" class="form-label">Year To :</label>
                        @if(isset($dateto)) 
                         <input type="date" class="form-control" id="date_to" name="dateto" value="{{$dateto}}"  >

                        @else
                        <input type="date" class="form-control" id="date_to" name="dateto"  >

                        @endif
                    </div>

                    <div class="col-md-2">
                        <label for="title" class="form-label">&nbsp;&nbsp; </label>
                        <br>
                        <button type="submit" class="btn btn-warning w-md" onclick="filterdata()" >FILTER</button>
                    </div>
                    
                </div>


            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">RFQ REPORT 
                </h3>

                <br>
                <table id="datatable" class="table table-striped dataTable no-footer nowrap w-100">  
                    
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                            <th><center>
                                 @if(isset($selectedOption)) 
                                         {{$selectedOption}}
                                 @else 
                                        CUSTOMER
                                 @endif
                            </center></th>
                            <th><center>INPROGRESS</center></th>
                            <th><center>SUBMITTED</center></th>
                            <th><center>NOTSUBMITTED</center></th>
                            <th><center>AWARDED</center></th> 
                            <th><center>TOTAL(RM)</center></th> 
                            
                        </tr>
                    </thead>
                    <tbody>           
                        <tr>
                            @php
                            $i = 1;
                            @endphp
                            @if(count($data) === 0)
                            <td colspan="10" align="center">No records found.</td>  
                            @else
                            @foreach ($data as $m)
                            <td  align="center">{{$i++}}</td>
                            @if(  $selectedOption == 'PIC') 
                                        
                            @php  $pic = DB::table('Users')->where('id', '=', $m->pic)->first();  @endphp   
                            <td  align="center">{{ $pic->name}}</td>

                            @else 

                            @php  $cust = DB::table('Customers')->where('id', '=', $m->cust_name)->first();  @endphp
                            <td  align="center">{{ $cust->name}}</td>
                            
                            @endif
                            @php
    
                            if( $selectedOption == 'PIC'){

                                if(isset($dateto)){

                                    $submit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Submitted')->where('pic', '=', $m->pic)->whereBetween ('created_at',[ $datefrom, $dateto])
                                                ->get();
                                    $inprogs = DB::table('proposals')
                                                ->where('rfq_status', '=', 'In Progress')->where('pic', '=', $m->pic)->whereBetween ('created_at',[ $datefrom, $dateto]) 
                                                ->get();
                                    $nsubmit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Not Submitted')->where('pic', '=', $m->pic)->whereBetween ('created_at',[ $datefrom, $dateto]) 
                                                ->get();
                                    $award = DB::table('proposals')
                                                ->where('rfq_status', '=', 'awarded')->where('pic', '=', $m->pic)->whereBetween ('created_at',[ $datefrom, $dateto])  
                                                ->get();
                                     

                                }else {

                               
                                    $submit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Submitted')->where('pic', '=', $m->pic)
                                                ->get();
                                    $inprogs = DB::table('proposals')
                                                ->where('rfq_status', '=', 'In Progress')->where('pic', '=', $m->pic)  
                                                ->get();
                                    $nsubmit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Not Submitted')->where('pic', '=', $m->pic) 
                                                ->get();
                                    $award = DB::table('proposals')
                                                ->where('rfq_status', '=', 'awarded')->where('pic', '=', $m->pic)  
                                                ->get();
                                    
                                           
                                }
                                    
                            }
                            elseif ($selectedOption != 'PIC') {
                                # code...
                          
                                
                                if(isset($dateto)){

                                    $submit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Submitted')->where('cust_name', '=', $m->cust_name)->whereBetween ('created_at',[ $datefrom, $dateto]) 
                                                ->get();
                                    $inprogs = DB::table('proposals')
                                                ->where('rfq_status', '=', 'In Progress')->where('cust_name', '=', $m->cust_name)->whereBetween ('created_at',[ $datefrom, $dateto])  
                                                ->get();
                                    $nsubmit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Not Submitted')->where('cust_name', '=', $m->cust_name)->whereBetween ('created_at',[ $datefrom, $dateto]) 
                                                ->get();
                                    $award = DB::table('proposals')
                                                ->where('rfq_status', '=', 'awarded')->where('cust_name', '=', $m->cust_name)->whereBetween ('created_at',[ $datefrom, $dateto])  
                                                ->get();
                                   
                                    
                                }else{


                                    $submit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Submitted')->where('cust_name', '=', $m->cust_name) 
                                                ->get();
                                    $inprogs = DB::table('proposals')
                                                ->where('rfq_status', '=', 'In Progress')->where('cust_name', '=', $m->cust_name)  
                                                ->get();
                                    $nsubmit = DB::table('proposals')
                                                ->where('rfq_status', '=', 'Not Submitted')->where('cust_name', '=', $m->cust_name) 
                                                ->get();
                                    $award = DB::table('proposals')
                                                ->where('rfq_status', '=', 'awarded')->where('cust_name', '=', $m->cust_name)  
                                                ->get();

                                      
                                }
                           

                            }else{
                                 

                            }


                          
                        

                        
                            $a = count($submit);
                    
                            $b = count($inprogs);
                    
                            $c = count($nsubmit);
                    
                            $d = count($award);
                    
                      
                    
                                   
                        
                            @endphp

                            <td  align="center">
                                @if($b == 0 )
                                -
                                @else
                                <h5>
                                        @if( $selectedOption == 'PIC')

                                            @if(isset($datefrom)) 
                                                <a target="_new" href=  "{{ route('rfqreport_inprogress_date', ['name' => $m->pic,'type' => 'pic','date_from' => $datefrom,'date_to' => $dateto]) }}"> {{ $b}}</a>
                                            @else
                                                <a target="_new" href=  "{{ route('rfqreport_inprogress', ['name' => $m->pic,'type' => 'pic']) }}"> {{ $b}}</a>
                                            @endif 

                                        @else

                                            @if(isset($datefrom)) 
                                                <a target="_new" href=  "{{ route('rfqreport_inprogress_date', ['name' => $m->cust_name,'type' => 'client','date_from' => $datefrom,'date_to' => $dateto]) }}"> {{ $b}}</a>
                                            @else
                                                <a target="_new" href=  "{{ route('rfqreport_inprogress', ['name' => $m->cust_name,'type' => 'client']) }}"> {{ $b}}</a>
                                            @endif

                                        @endif 
                                </h5>
                                @endif
                            </td>

                            <td  align="center">
                                @if($a == 0 )
                                -
                                @else
                                <h5>
                                    
                                        @if( $selectedOption == 'PIC' )

                                            @if(isset($datefrom)) 
                                                 <a target="_new" href=  "{{ route('rfqreport_submited_date', ['name' => $m->pic,'type' => 'pic','date_from' => $datefrom,'date_to' => $dateto]) }}"> {{ $a}}</a>
                                            @else
                                                 <a target="_new" href=  "{{ route('rfqreport_submited', ['name' => $m->pic,'type' => 'pic']) }}"> {{ $a}}</a>
                                            @endif 

                                        @else

                                            @if(isset($datefrom)) 
                                                 <a target="_new" href=  "{{ route('rfqreport_submited_date', ['name' => $m->cust_name,'type' => 'client','date_from' => $datefrom,'date_to' => $dateto]) }}"> {{ $a}}</a>
                                            @else
                                                 <a target="_new" href=  "{{ route('rfqreport_submited', ['name' => $m->cust_name,'type' => 'client']) }}"> {{ $a}}</a>
                                            @endif

                                        @endif 
                                </h5>
                                @endif
                            </td>
                            
                            <td  align="center">
                                @if($c == 0 )
                                -
                                @else
                                <h5>
                          
                                        @if( $selectedOption == 'PIC')

                                            @if(isset($datefrom)) 
                                                <a target="_new" href=  "{{ route('rfqreport_notsubmited_date', ['name' => $m->pic,'type' => 'pic','date_from' => $datefrom,'date_to' => $dateto]) }}"> {{ $c}}</a>
                                            @else
                                                <a target="_new" href=  "{{ route('rfqreport_notsubmited', ['name' => $m->pic,'type' => 'pic']) }}"> {{ $c}}</a>
                                            @endif 

                                        @else

                                            @if(isset($datefrom)) 
                                                <a target="_new" href=  "{{ route('rfqreport_notsubmited_date', ['name' => $m->cust_name,'type' => 'client','date_from' => $datefrom,'date_to' => $dateto]) }}"> {{ $c}}</a>
                                            @else
                                                <a target="_new" href=  "{{ route('rfqreport_notsubmited', ['name' => $m->cust_name,'type' => 'client']) }}"> {{ $c}}</a>
                                            @endif

                                        @endif 
                                </h5>
                                @endif
                            </td>
                            <td  align="center">
                                @if($d == 0 )
                                -
                                @else 
                               <h5>
                                        @if( $selectedOption == 'PIC')

                                            @if(isset($datefrom)) 
                                                <a target="_new" href=  "{{ route('rfqreport_awarded_date', ['name' => $m->pic,'type' => 'pic','date_from' => $datefrom,'date_to' => $dateto]) }}"> {{ $d}}</a>
                                            @else
                                                <a target="_new" href=  "{{ route('rfqreport_awarded', ['name' => $m->pic,'type' => 'pic']) }}"> {{ $d}}</a>
                                            @endif 

                                        @else

                                            @if(isset($datefrom)) 
                                                <a target="_new" href=  "{{ route('rfqreport_awarded_date', ['name' => $m->cust_name,'type' => 'client','date_from' => $datefrom,'date_to' => $dateto]) }}"> {{ $d}}</a>
                                            @else
                                                <a target="_new" href=  "{{ route('rfqreport_awarded', ['name' => $m->cust_name,'type' => 'client']) }}"> {{ $d}}</a>
                                            @endif

                                        @endif 
                               </h5>
                                @endif 
                            </td>
                            <td  align="center">
                               
                                @php
                                    if( $selectedOption == 'PIC'){

                                        if(isset($datefrom)) {
                                            $rowIds = DB::table('proposals')
                                                    ->where('pic', $m->pic)
                                                    ->whereBetween ('created_at',[ $datefrom, $dateto])
                                                    ->pluck('id')
                                                    ->all();
                                        }else{
                                            $rowIds = DB::table('proposals')
                                                    ->where('pic', $m->pic)
                                                    ->pluck('id')
                                                    ->all();
                                        }

                                    }else{

                                        if(isset($datefrom)) {
                                            $rowIds = DB::table('proposals')
                                                    ->where('cust_name', $m->cust_name)
                                                    ->whereBetween ('created_at',[ $datefrom, $dateto])
                                                    ->pluck('id')
                                                    ->all();
                                        }else{
                                            $rowIds = DB::table('proposals')
                                                ->where('cust_name', $m->cust_name)
                                                ->pluck('id')
                                                ->all();
                                        }                               
                                    }
                                     

                                    $total = DB::table('proposals')
                                            ->whereIn('id',  $rowIds)  
                                            ->sum('award_amount');
                                @endphp
                                    
                                    {{ $total}}

                            </td>

                           
                             
                        </tr>    
                        @endforeach
                        @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div> 
</div> 

 

 
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/build/js/pages/datatables.init.js') }}"></script>
@endsection

