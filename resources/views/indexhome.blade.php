@extends('layouts.master')
@section('title', 'Dashboard') 
@section('content')
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@php
    $data = DB::table('proposals') 
                ->where('pic', Auth::user()->id) 
                ->orderBy('due_date', 'asc')
                    ->get();
    $totalCount = count($data);
@endphp
@php
    $submit = DB::table('proposals')
                ->where('rfq_status', '=', 'Submitted') 
                ->where('pic', Auth::user()->id) 
                ->get();
    $inprogs = DB::table('proposals')
                ->where('rfq_status', '=', 'In Progress')
                ->where('pic', Auth::user()->id)  
                ->get();
    $nsubmit = DB::table('proposals')
                ->where('rfq_status', '=', 'Not Submitted')
                ->where('pic', Auth::user()->id)  
                ->get();
    $award = DB::table('proposals')
                ->where('rfq_status', '=', 'Awarded')
                ->where('pic', Auth::user()->id)  
                ->get();

    $a = count($submit);

    $b = count($inprogs);

    $c = count($nsubmit);

    $d = count($award);
@endphp
<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Welcome Back !</h5>
                           
                            <p>BoilerMaster</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <!-- <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle"> -->
                        </div>
                        <h5 class="font-size-15 text-truncate"><strong>{{ucfirst(Auth::user()->name)}}</strong><br><br>
                            <a href="{{route('users.show', (Auth::user()->id)) }}" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12" hidden>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Today's Meeting</h4>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">Client</th>
                                    <th class="align-middle">From</th>
                                    <th class="align-middle">To</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ABC</td>
                                    <td>09.00</td>
                                    <td>10.00</td>
                                </tr>
                                <tr>
                                    <td>ABC</td>
                                    <td>10.00</td>
                                    <td>11.00</td>
                                </tr>
                                <tr>
                                    <td>ABC</td>
                                    <td>11.00</td>
                                    <td>12.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">SUBMITED</p>
                                <h4 class="mb-0"><a href="{{ route('proposal_submited') }}"> {{ $a}} </a></h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-copy-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">In-Progress</p>
                                <h4 class="mb-0"><a href="{{ route('proposal_inprogress') }}"> {{ $b}} </a> </h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-warning">
                                        <i class="bx bx-archive-in font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">NOT SUBMITTED</p>
                                <h4 class="mb-0"><a href="{{ route('proposal_notsubmited') }}">  {{ $c}} </a>  </h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-danger">
                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">AWARDED</p>
                                <h4 class="mb-0"><a href="{{ route('proposal_awarded') }}">  {{ $d}} </a> </h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-danger">
                                        <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">PROPOSAL DUE</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table align-middle table-nowrap table-sm mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle">No</th>
                                <th class="align-middle">Proposal Title</th>
                                <th class="align-middle">PIC</th>
                                <th class="align-middle">Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            @foreach ($data as $d)
                             
                            <tr>
                                <td>{{ $loop->index + 1}}</td>
                                <td>{{$d->rfq_title}}</td>
                                <td>{{$d->pic}} </td>
                                <td>{{$duedate = date("d-m-Y", strtotime($d->due_date))}}</td>
                                
                            </tr>
                             @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
<!-- end row -->

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