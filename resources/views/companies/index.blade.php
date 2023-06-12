@extends('layouts.master')
@section('title', 'List of Companies') 
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
            <h4 class="mb-sm-0 font-size-18">List of Companies</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">List of Companies</li>
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
                @can('create-company')
                    <a href="{{ route('companies.create') }}" class="btn btn-primary"> <i class="bx bx-plus"></i> Create</a>
                @endcan
                </h3>

                <table id="datatable" class="table table-striped dataTable no-footer nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                            $i = 1;
                            @endphp
                            @if(count($companyList) === 0)
                            <td colspan="10" align="center">No records found.</td>  
                            @else
                            @foreach ($companyList as $m)
                            <td>{{$i++}}</td>
                            <td>{{ $m->company_name}}</td>
                            <td>{{ $m->address}}</td>
                            <td>{{ $m->phone}}</td>
                            <td>
                                <a href="{{ route('companies.show',$m->id) }}"><i class="bx bx-search-alt" title="View Details Companies" style="color:black"></i></a>
                                @can('edit-company')
                                    <a href="{{ route('companies.edit',$m->id) }}"><i class="bx bx-edit-alt" title="Edit/Update Companies"></i></a>
                                @endcan
                                @can('delete-company')
                                    {!! Form::open(['method' => 'DELETE','route' => ['companies.destroy', $m->id],'style'=>'display:inline']) !!}
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this company?')) { this.parentNode.submit(); }" >
                                    <i class="bx bx-trash"  title="Delete Role" style="color:red" title="Delete"></i>
                                    {!! Form::close() !!}
                                    </a>
                                @endcan
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

