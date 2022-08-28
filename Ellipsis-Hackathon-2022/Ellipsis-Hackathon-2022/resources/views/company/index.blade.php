@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/toastr.css')}}">

@endsection

@section('main-content')
<div class="breadcrumb">
   <h1>Company</h1>
   <ul>
      <li>Company</li>
   </ul>
</div>
<div class="separator-breadcrumb border-top"></div>



<!-- Start of Admin's view -->
@can('admin-priv')
<div class="col-md-12 mb-4">
   <div class="card text-left">
      <div class="card-body">
         <div class="table-responsive">
            <table id="default_ordering_table" class="display table table-striped table-bordered" style="width:100%">
               <thead>
                  <th scope="col">Name</th>
                  <th scope="col">UEN</th>
                  <th scope="col">Address</th>
                  <th scope="col">Gst Registered</th>
                  <th scope="col">Contacts</th>
                  <th scope="col">Applications</th>
                  <th class="pl-5 text-center" scope="col">Action</th>
               </thead>
               <tbody>
                  @foreach($companies as $company)
                  <tr>
                     <td scope="row">{{$company->name}} </td>
                     <td>{{$company->uen}} </td>
                     <td>{{$company->address}} </td>
                     <td class="text-center">{{$company->gst_registered == 1 ? 'Yes' : 'No'}}</td>
                     <td class="text-center">{{count($company->contacts)}}</td>
                     <td class="text-center">{{count($company->applications)}}</td>
                     <td>
                        <div class="col text-center">
                           <a class="btn btn-outline-info" href="{{route('showCompany', $company)}}">View</a>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endcan
<!-- End of Admin's view -->




<!-- Start of Relationship Manager's and Manager's view -->
@can('manager-rm')
<div class="pb-4 pl-3">
   <a class="btn btn-primary" href="{{ route('createCompany') }}" role="button">Create Company</a><br>
</div>
<div class="col-md-12 mb-4">
   <div class="card text-left">
      <div class="card-body">
         <div class="table-responsive">
            <table id="default_ordering_table" class="display table table-striped table-bordered" style="width:100%">
               <thead>
                  <th scope="col">Name</th>
                  <th scope="col">UEN</th>
                  <th scope="col">Address</th>
                  <th scope="col">Industry</th>
                  <th scope="col">Gst Registered</th>
                  <th scope="col">Contacts</th>
                  <th scope="col">Applications</th>
                  <th class="pl-5 text-center" scope="col">Action</th>
               </thead>
               <tbody>
                  @foreach($companies as $company)
                  <tr>
                     <td scope="row">{{$company->name}} </td>
                     <td>{{$company->uen}} </td>
                     <td>{{$company->address}} </td>
                     <td>{{$company->industries->name}} </td>
                     <td class="text-center">{{$company->gst_registered == 1 ? 'Yes' : 'No'}}</td>
                     <td class="text-center">{{count($company->contacts)}}</td>
                     <td class="text-center">{{count($company->applications->where('user_id', '=', Auth::user()->id))}}</td>
                     <td>
                        <div class="col text-center">
                           <a class="btn btn-outline-info" href="{{route('showCompany', $company)}}">View</a>
                           <a class="btn btn-outline-secondary" href="{{route('editCompany', $company)}}">Edit</a>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endcan
<!-- End of Relationship Manager's and Manager's view -->




@endsection
@push('page-js')
<script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/toastr.min.js')}}"></script>
<script>
   $(document).ready(function() {
      $('#default_ordering_table').DataTable({
         "order": [
            [0, "asc"]
         ]
      });
   })
</script>
@if(session('toast-success'))
<script>
   toastr.success("{{session('toast-success')}}", "Success", {
      timeOut: "5000",
   });
</script>
@endif
@endpush