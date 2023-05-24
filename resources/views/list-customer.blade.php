@extends('layouts.master') 
@section('content') 
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
 
 <!-- start page title -->
 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{$page_modual}}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">{{$page_modual}} List</li>
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
                    <h3 class="card-title mb-4 d-flex justify-content-between align-items-center text-capitalize">{{$page_modual}} Lists
                        <a href="{{route('index_'.$page_modual)}}" class="btn btn-primary"> <i class="bx bx-plus"></i> Create</a>
                    </h3>
                    <table id="datatable" class="table   dataTable no-footer nowrap w-100">
                         
                        <tbody> 
                            @foreach ($data as $d)
                                    <tr>
                                        <th width=" ">#</th>
                                        <th width=" ">Name</th>
                                        <th width=" ">Address</th>
                                        <th width=" "><center>Branches</center></th>                                
                                        <th width=" ">Actives</th>
                                        <th width=" " ><center>Actions</center></th>
                                        
                                    </tr>
                                    @php
                                    
                                    
                                    $branch = DB::table('branches')
                                                ->where('cust_id', '=', $d->id )
                                                ->where('status', '=', 'Active' )
                                                ->where('parent', '=', $page_modual )
                                                ->get();

                                    $totalCount = count($branch);
                                    
                                    $alphabet = chr($loop->index + 65); // Convert index to ASCII value and add 65 (ASCII for 'A')
                                            

                                    @endphp
                                    <tr  class="table-active">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $d->name}}</td>
                                        <td>{{ $d->add}} <br><br>
                                            <b>PIC: </b>{{ $d->pic}} <br>
                                            <b>Email: </b>suhada.tapisdaya@gamil.com <br>
                                            <b>Phone No: </b>{{ $d->ph_no}}<br>
                                            <b>Fax No: </b>{{ $d->fax_no}} <br>
                                        </td>
                                        <td align="center"><a href="{{ route('add-branches', ['id' => $d->id, 'page_modual' => $page_modual]) }}"> <span style="height:60px;" class="btn btn-primary"> <i class='bx bx-plus' ></i> Branches
                                            <br><p style="background-color: white;color:black;border-radius: 5px;
                                            width: 20px; height: 20px; margin-left:30px; ">{{ $totalCount }}</p>  
                                        </span></a>

                                        </td> 
                                        <td><span class="badge bg-success fs-6">{{ $d->status}}</span></td> 
                                        <td align="center">
                                            <a href="{{ route('view_'.$page_modual, ['id' => $d->id, 'page_modual' => $page_modual]) }}" ><i class="bx bx-search" title="Search"></i></a>
                                            <a href="{{ route('Edit_view_'.$page_modual, ['id' => $d->id, 'page_modual' => $page_modual]) }}"><i class="bx bx-edit-alt" title="Edit"></i></a>
                                            <a href="{{ route('delete_'.$page_modual, ['id' => $d->id, 'page_modual' => $page_modual]) }}" onclick="return confirm('Are you sure you want to delete ?')"><i class="bx bx-trash" title="Delete"></i></a>
                                        </td>
                                    
                                    </tr> 
                                    <tr class="table-info" >
                                        <td>  </td>
                                        <td colspan="5"> 
                                            <center>
                                                <b>BRANCH</b>
                                            </center>
                                        </td>
                                        
                                    </tr>
                                        @forelse ($branch as $b)

                                            @php
                                            $alphabet = chr($loop->index + 65); // Convert index to ASCII value and add 65 (ASCII for 'A')
                                            @endphp
                                                    
                                            @if ($loop->index > 0)
                                                    
                                            @else
                                            <tr   >
                                                <td width=" "></td>
                                                <td width=" ">Bil</td>
                                                <td width=" ">Name</td>
                                                <td width=" ">Address</td>
                                                <td width=" ">status</td>                                
                                                <td width=" " ><center>Actions</center></td>
                                                    
                                            </tr>
                                            @endif
                                                                

                                                            

                                            <div class="item">
                                                        <tr   id="myDiv">
                                                            
                                                            <td> </td>
                                                            <td class="item-name">{{ $alphabet ."." }}</td>
                                                            <td class="item-name"> {{ $b ->name}}</td>
                                                            <td  class="item-name"> {{ $b ->add}} </td>
                                                            @if($b ->active < 2) 
                                                                <td><span class="badge bg-success fs-6"> Active</span></td> </td> 
                                                            @else 
                                                                <td><span class="badge bg-danger fs-6"> Inactive</span></td> </td> 
                                                             
                                                            @endif
                                                            
                                                            
                                                            <td align="center">
                                                                <a href=  "{{ route('view-branches', ['id' => $b->id, 'page_modual' => $page_modual]) }}"><i class="bx bx-search" title="Search"></i></a>
                                                                <a href=  "{{ route('Edit-branches', ['id' => $b->id, 'page_modual' => $page_modual]) }}"><i class="bx bx-edit-alt" title="Edit"></i></a>
                                                                <a href=  "{{ route('delete-branches', ['id' => $b->id, 'page_modual' => $page_modual]) }}" onclick="return confirm('Are you sure you want to delete ?')"><i class="bx bx-trash" title="Delete"></i></a>
                                                            </td>
                                                            </tr>
                                            </div>          
                                                @empty
                                                <tr      >
                                                    <td>  </td>
                                                    <td colspan="5"> 
                                                        <center>
                                                          No Branch Record 
                                                        </center>
                                                    </td>
                                                    
                                                </tr>
                                            

                                        @endforelse 
                              

                            @endforeach

                                                   
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


