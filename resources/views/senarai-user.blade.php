@extends('layouts.master')
@section('title', 'User Listing') 
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
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
                <h4 class="mb-sm-0 font-size-18">User Lists</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">User List</li>
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
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">User Lists
                        <a href="borang-user" class="btn btn-primary"> <i class="bx bx-plus"></i> Create</a>
                    </h3>
                    <table id="datatable" class="table table-striped dataTable no-footer nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Alternative Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Branch</th>
                                <th width="30">Actived</th>
                                <th width="60">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @php
                        $i = 1;
                        @endphp
                        @if(count($user) === 0)
                        <td colspan="10" align="center">No records found.</td>    
                        
                        @else
                        @foreach ($user as $m)
                        <td>{{$i++}}</td>
                        <td>{{ $m->name}}</td>
                        <td>{{ $m->email}}</td>
                        <td>{{ $m->alternative_email}}</td>
                        <td>{{ $m->phone}}</td>
                        <td>{{ $m->position}}</td>
                        <td>{{ $m->branch}}</td>
                        <td>{{ $m->activation_status}}</td>
                        <td>
                            <form action="/senarai-user/{{$m->id}}" method="POST">
                                <a href="edit-user/{{$m->id}}" class="btn btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <a href="" class="btn btn-danger">Delete</a> 
                            </form>
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
</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
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
