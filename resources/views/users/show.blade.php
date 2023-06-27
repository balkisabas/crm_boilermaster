@extends('layouts.master')
@section('title', 'View Users') 

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
            <h4 class="mb-sm-0 font-size-18">View Users</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">View Users</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
@php  $company = DB::table('Companies')->where('id', '=', $user->company)->first();  @endphp 
@php  $positions = DB::table('positions')->where('id', '=', $user->position)->first();  @endphp 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">View Users
                    <a href="{{ route('users.index')}}" class="btn btn-primary"> <i class="bx bx-arrow-back"></i> Back</a>
                </h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="widthtable">Name</th>
                            @if (isset($user->name))  
                                <td> : {{$user->name}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr>  
                        <tr>
                            <th class="widthtable">Email</th>
                            @if (isset($user->email))  
                                <td> : {{$user->email}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Alternative Email</th>
                            @if (isset($user->alternative_email))  
                                <td> : {{$user->alternative_email}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Position</th>
                            @if (isset($positions->name ))  
                                <td> : {{$positions->name }}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr> 
                        <tr>
                            <th class="widthtable">Company</th>
                            @if (isset($company->company_name))  
                                <td> : {{$company->company_name}}</td>
                            @else 
                                <td> :  -</td>
                            @endif
                        </tr>
                        <tr>
                            <th class="widthtable">Active</th>
                            @if (isset($user->status))  
                                <td>: 
                                    @if($user->status == 'Yes')
                                    <span class="badge bg-success fs-6">{{ $user->status}}</span>
                                    @else
                                    <span class="badge bg-danger fs-6">{{ $user->status}}</span>
                                    @endif
                                </td>
                                @else 
                                    <td> :  -</td>
                            @endif
                            <td> 
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

