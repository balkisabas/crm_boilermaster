@extends('layouts.master')
@section('title', 'View Proposal') 

@section('content')
<style>
    th.widthtable {
        width:280px
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
@php  
        $company = DB::table('Companies')->where('id', '=', $rfq->company)->first();  
        $cust = DB::table('Customers')->where('id', '=', $rfq->cust_name)->first();  
        $pic = DB::table('Users')->where('id', '=', $rfq->pic)->first(); 
        $cust_pic = DB::table('Personincharges')->where('id', '=', $rfq->cust_pic)->first();
        $type = DB::table('Rfqtypes')->where('id', '=', $rfq->type)->first();
        $status = DB::table('Rfqstatuses')->where('id', '=', $rfq->rfq_status)->first();
         
@endphp
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
                            <td>{{ $company->company_name }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">PIC</th>
                            <td>{{ $pic->name }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Proposal type</th>
                            <td>{{ $type->name }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer</th>
                            <td>{{ $cust->name }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer PIC</th>
                            <td>{{ $cust_pic->name }}</td>
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
                            <td>{{ $rfq->final_pricing }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">RFQ status</th>
                            <td>{{ $status->name }}</td>
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
                            <td>{{ $rfq->award_amount }}</td>
                        </tr> 
                        
                        <tr><td><strong>Uploaded Document</strong><td></td></td>
                        </tr>
                        <tr>
                        @foreach ($rfq->proposalDoc as $m)
                        
                        @php $doc = DB::table('Documents')->where('id', '=', $m->document_type)->first(); @endphp

                            <td><li><strong> Document Name:</strong>  {{ $m->document_name }}</li>
                            <li><strong> Document Type:</strong>  {{ $doc->name }}</li>
                            <li><strong> Document Type:</strong>  {{ $m->created_at->format('d-m-Y') }}</li>
                            <li><strong> Filename:</strong>  {{ $m->filename }} <a href="{{ asset('/uploads/' . $m['filename']) }}" class="btn btn-info btn-sm"> Download File </a></td></li>
                        </td>
                        <td></td>
                        </tr> 
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

