@extends('admin.admin_dashboard')
@section('admin') 

<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <button type="button" class="btn btn-outline-primary px-5 radius-30">Create User </button>
                </ol>
            </nav>
        </div>
        
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase"><h1> {{request()->getPathInfo()}}</h1></h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>User Code</th>
                            {{-- <th>User Name</th> --}}
                            <th>Email</th>
                            <th width="0%">Mobile</th>
                            <th>Lock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($tabledata as $key=> $record ) 
                        <tr>
                            <td>{{ $key+1 }}</td>
                             <td>{{ $record->USER_CODE }}</td>
                             {{-- <td>{{ $record->USER_NAME }}</td> --}}
                             <td>{{ $record->EMAIL }}</td>
                            <td>{{ $record->MOBILE_NO }}</td>
                             <td>{{ $record->IS_LOCK }}</td>
                            <td>  <a href="/sec/edit/SEC_0003_EDIT/{{$record->USER_ID}}" class="btn btn-link px-3"> Edit</a>
                            </td>
                        </tr>
                    @endforeach  
                    </tbody>
                 
                </table>
            
        </div>
    </div>
     
    <hr/>
     
</div>




@endsection