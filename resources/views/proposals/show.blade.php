@extends('layouts.master')
@section('title', 'View Proposal') 

@section('content')
<style>
    th.widthtable {
        width:280px
        }
    .checkbox-list {
    column-count: 3;
    column-gap: 10px;
    }
</style>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">View Proposal</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">View Proposal</li>
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
                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">View Proposal
                    <a href="{{ route('proposals.index')}}" class="btn btn-primary"> <i class="bx bx-arrow-back"></i> Back</a>
                </h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="widthtable">Name</th>
                            <td>{{ $rfq->company }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">PIC</th>
                            <td>{{ $rfq->pic }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Proposal type</th>
                            <td>{{ $rfq->type }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer</th>
                            <td>{{ $rfq->cust_name }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer PIC</th>
                            <td>{{ $rfq->cust_pic }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer email</th>
                            <td>{{ $rfq->cust_email }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">RFQ No</th>
                            <td>{{ $rfq->rfq_no }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">RFQ title</th>
                            <td>{{ $rfq->rfq_title }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Due Date</th>
                            <td>{{ $rfq->due_date }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Final Pricing</th>
                            <td>RM {{ $rfq->final_pricing }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">RFQ status</th>
                            <td>{{ $rfq->rfq_status }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer PO No</th>
                            <td>{{ $rfq->cust_po_no }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Date Award</th>
                            <td>{{ $rfq->date_award }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Award Amount</th>
                            @if (isset($rfq['award_amount']))  
                                <td>RM {{ $rfq['award_amount'] }}</td>
                            @else 
                                <td>-</td>
                            @endif
                        </tr>             
                    </thead>
                </table>
                <table class="table">
                <tr><td><strong>Uploaded Document</strong></td></tr>
                     @foreach ($rfq->proposalDoc as $m)
                    <tr>
                        <td><li><strong> Document Name:</strong>  {{ $m->document_name }}</li>
                        <li><strong> Document Type:</strong>  {{ $m->document_type }}</li>
                        <li><strong> Date Created:</strong>  {{ $m->created_at->format('d-m-Y') }}</li>
                        <li><strong> Filename:</strong>  {{ $m->filename }} <a href="{{ asset('/uploads/' . $m['filename']) }}" class="btn btn-info btn-sm"> Download File </a></td></li>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

