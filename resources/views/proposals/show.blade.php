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
                            @if (isset($company->company_name))  
                                <td> : {{$company->company_name}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">PIC</th>
                            @if (isset($pic->name ))  
                                <td> : {{$pic->name }}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Proposal type</th>
                            @if (isset($type->name))  
                                <td> : {{$type->name}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer</th>
                            @if (isset($cust->name ))  
                                <td> : {{$cust->name }}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer PIC</th>
                            @if (isset($cust_pic->name))  
                                <td> : {{$cust_pic->name}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer email</th>
                            @if (isset($rfq->cust_email))  
                                <td> : {{ $rfq->cust_email}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">RFQ No</th>
                            @if (isset($rfq->rfq_no))  
                                <td> : {{$rfq->rfq_no}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">RFQ title</th>
                            @if (isset($rfq->rfq_title))  
                                <td> : {{$rfq->rfq_title}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Due Date</th>
                            @if (isset($rfq->due_date ))  
                                <td> : {{$rfq->due_date }}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Final Pricing</th>
                            @if (isset($rfq->final_pricing))  
                                <td> : RM {{$rfq->final_pricing}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">RFQ status</th>
                            @if (isset($rfq->rfq_status ))  
                                <td> : {{$rfq->rfq_status }}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Customer PO No</th>
                            @if (isset($rfq->cust_po_no ))  
                                <td> : {{$rfq->cust_po_no }}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Date Award</th>
                            @if (isset($rfq->date_award ))  
                                <td> : {{$rfq->date_award }}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Award Amount</th>
                            @if (isset($rfq->award_amount))  
                                <td> : RM {{$rfq->award_amount}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
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

