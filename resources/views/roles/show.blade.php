@extends('layouts.master')
@section('title', 'View Roles') 

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
            <h4 class="mb-sm-0 font-size-18">View Roles</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="/index"><i class="bx bx-home-circle"></i> Home</a></li>
                    <li class="breadcrumb-item active">View Roles</li>
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

                <h3 class="card-title mb-4 d-flex justify-content-between align-items-center">View Roles
                    <a href="{{ route('roles.index') }}" class="btn btn-primary"> <i class="bx bx-arrow-back"></i> Back</a>
                </h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="widthtable">Name</th>
                            <td>{{ $role->name }}</td>
                        </tr> 
                        <tr>
                            <th class="widthtable">Permissions</th>
                            <td> @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                        <label class="label label-success">{{ $v->name }},</label>
                                    @endforeach
                                @endif
                            </td>
                        </tr>  
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection























