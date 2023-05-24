@extends('layouts.master')
@section('title', 'Proposal Listing') 
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">RFQ Lists</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">RFQ List</li>
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

                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">RFQ Listing
                    <a href="proposal-form" class="btn btn-primary"> <i class="bx bx-plus"></i> Create</a>
                </h3>

                <table id="datatable" class="table table-striped dataTable no-footer nowrap w-100">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th style="width:10px">Customer PO</th>
                            <th>Title</th>
                            <th style="width:10px">Client</th>
                            <th>RFQ No.</th>
                            <th>Due Date</th>
                            <th>Awarded Amount (RM)</th>
                            <th>PIC</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                            $i = 1;
                            @endphp
                            @if(count($rfq) === 0)
                            <td colspan="10" align="center">No records found.</td>  
                            @else
                            @foreach ($rfq as $m)
                            <td>{{$i++}}</td>
                            <td>{{ $m->cust_po_no}}</td>
                            <td>{{ $m->rfq_title}}</td>
                            <td>{{ $m->cust_name}}</td>
                            <td>{{ $m->rfq_no}}</td>
                            <td>{{ $m->due_date}}</td>
                            <td>{{ $m->award_amount}}</td>
                            <td>{{ $m->pic}}</td>
                            <td>{{ $m->rfq_status}}</td>
                            <td>
                                    <a href="senarai-docs/{{$m->id}}" ><i class="bx bx-folder" style="color:black" title="View File"></i></a>
                                    <a href="edit-proposal/{{$m->id}}" ><i class="bx bx-edit-alt" title="Edit/Update RFQ"></i></a>
                                    <a href="{{ route('deleteProposal', $m->id) }}"><i class="bx bx-trash"  style="color:red" onclick="return confirm('Delete this record?')" title="Delete"></i></a>
                               
                            </td>
                        </tr>    
                        @endforeach
                        @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
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

