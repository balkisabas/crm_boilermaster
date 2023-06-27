@extends('layouts.master')
@section('title', 'User List') 
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Audits Trail</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/index">Home</a></li>
                        <li class="breadcrumb-item active">Audits Trail</li>
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
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">Audits Trail</h3>
                    <table id="datatable" class="table table-striped dataTable no-footer nowrap w-100">
                        <thead>
                            <tr>
                                <th width="10">#</th>
                                <th>Auditable_type</th>
                                <th>Event</th>
                                <th>User</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @if(count($audits) === 0)
                            <td colspan="10" align="center">No records found.</td>  
                            @else
                                @foreach ($audits as $audit)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $audit->auditable_type }}</td>
                                <td>{{ $audit->event }}</td>
                                <td>{{ $audit->user->name }}</td>
                                <td>
                                    @switch($audit->auditable_type)
                                        @case('App\Models\User')
                                            @if ($audit->event === 'created')
                                                New data created for user
                                            @elseif ($audit->event === 'updated')
                                                Updated data for user
                                            @else
                                                {{ $audit->new_values }}
                                            @endif
                                            @break

                                        @case('App\Models\Customer')
                                            @if ($audit->event === 'created')
                                                New data created for customer
                                            @elseif ($audit->event === 'updated')
                                                Updated data for customer
                                            @else
                                                {{ $audit->new_values }}
                                            @endif
                                            @break

                                        @case('App\Models\Personincharge')
                                            @if ($audit->event === 'created')
                                                New data created for PIC
                                            @elseif ($audit->event === 'updated')
                                                Updated data for PIC
                                            @else
                                                {{ $audit->new_values }}
                                            @endif
                                            @break
                                        
                                        @case('App\Models\Vendor')
                                            @if ($audit->event === 'created')
                                                New data created for vendor
                                            @elseif ($audit->event === 'updated')
                                                Updated data for vendor
                                            @else
                                                {{ $audit->new_values }}
                                            @endif
                                            @break

                                        @case('App\Models\Proposal')
                                            @if ($audit->event === 'created')
                                                New data created for proposal
                                            @elseif ($audit->event === 'updated')
                                                Updated data for proposal
                                            @else
                                                {{ $audit->new_values }}
                                            @endif
                                            @break

                                        @case('App\Models\ProposalDoc')
                                            @if ($audit->event === 'created')
                                                New data created for proposal document
                                            @elseif ($audit->event === 'updated')
                                                Updated data for proposal document
                                            @else
                                                {{ $audit->new_values }}
                                            @endif
                                            @break

                                        @case('App\Models\Companies')
                                            @if ($audit->event === 'created')
                                                New data created for company
                                            @elseif ($audit->event === 'updated')
                                                Updated data for company
                                            @else
                                                {{ $audit->new_values }}
                                            @endif
                                            @break
                                            
                                        @case('App\Models\Documents')
                                            @if ($audit->event === 'created')
                                                New data created for document
                                            @elseif ($audit->event === 'updated')
                                                Updated data for document
                                            @else
                                                {{ $audit->new_values }}
                                            @endif
                                            @break

                                        @case('App\Models\Positions')
                                            @if ($audit->event === 'created')
                                                New data created for position
                                            @elseif ($audit->event === 'updated')
                                                Updated data for position
                                            @else
                                                {{ $audit->new_values }}
                                            @endif
                                            @break

                                        @case('App\Models\Rfqtypes')
                                            @if ($audit->event === 'created')
                                                New data created for RFQ type
                                            @elseif ($audit->event === 'updated')
                                                Updated data for RFQ type
                                            @else
                                                {{ $audit->new_values }}
                                            @endif
                                            @break

                                        @case('App\Models\Rfqstatuses')
                                            @if ($audit->event === 'created')
                                                New data created for RFQ status
                                            @elseif ($audit->event === 'updated')
                                                Updated data for RFQ status
                                            @else
                                                {{ $audit->new_values }}
                                            @endif
                                            @break
                                        @default
                                            {{ $audit->new_values }}
                                    @endswitch
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

    <!-- Bootstrap JS untuk pop up modal-->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
@endsection