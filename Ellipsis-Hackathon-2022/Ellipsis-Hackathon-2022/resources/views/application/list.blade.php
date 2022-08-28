@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/toastr.css')}}">

@endsection

@section('main-content')
<div class="breadcrumb">
   <h1>Applications</h1>
   <ul>
      <li>Applications</li>
   </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
@if (session('message'))
<div class="alert alert-danger text-center">{{ session('message') }}</div>
@endif
@can('manager-rm')
<div class="pb-4 pl-3">
   <a class="btn btn-primary" href="{{ route('loadCreate') }}" role="button">Create New Application</a><br>
</div>
@endcan
<div class="col-md-12 mb-4">
   <div class="card text-left">
      <div class="card-body">
         <div class="table-responsive">

            <!-- Start of admin view -->
            @can('admin-priv')
            <table id="default_ordering_table" class="display table table-striped table-bordered" style="width:100%">
               <thead>
                  <th scope="col">Application ID</th>
                  <th scope="col">Company</th>
                  <th scope="col">Created By</th>
                  <th scope="col">Status</th>
                  <th scope="col">Score</th>
                  <th scope="col">Assigned To</th>
                  <th scope="col">Created On</th>
                  <th scope="col">Last Updated</th>
                  <th class="pl-5" scope="col">Action</th>
               </thead>

               <tbody>
                  @foreach($applications as $application)
                  <tr>
                     <td scope="row">{{$application->application_id}} </td>
                     <td scope="row">{{App\Company::find($application->company_id)->name}} </td>
                     <td>{{App\User::find($application->created_by)->name}} </td>
                     <td>
                        @if($application->status == 'new')
                        <span class="badge indigo text-white p-1 m-2">New</span>
                        @elseif($application->status == 'pending')
                        <span class="badge orange text-white p-1 m-2">Pending</span>
                        @elseif($application->status == 'approved')
                        <span class="badge badge-success p-1 m-2">Approved</span>
                        @elseif($application->status == 'rejected')
                        <span class="badge badge-danger p-1 m-2">Rejected</span>
                        @elseif($application->status == 'aborted')
                        <span class="badge badge-warning p-1 m-2">Aborted</span>
                        @elseif($application->status == 'reviewing')
                        <span class="badge badge-dark p-1 m-2">Reviewing</span>
                        @endif
                     </td>
                     <td>
                        @if($application->score == 'hot')
                        <span class="badge orange text-white p-1 m-2">Hot</span>
                        @elseif($application->score == 'warm')
                        <span class="badge text-white p-1 m-2" style="background-color: lightsalmon;">Warm</span>
                        @elseif($application->score == 'cold')
                        <span class="badge teal text-white p-1 m-2">Cold</span>
                        @elseif($application->score == 'aborted')
                        <span class="badge badge-warning p-1 m-2">Aborted</span>
                        @elseif($application->score == 'rejected')
                        <span class="badge badge-danger p-1 m-2">Rejected</span>
                        @endif
                     </td>
                     <td>{{App\User::find($application->user_id)->name}}</td>
                     <td>{{$application->created_at->format('d M y  h:i A')}} </td>
                     <td>{{$application->updated_at->format('d M y  h:i A')}} </td>
                     <td>
                        <div class="col text-center">
                           <a class="btn btn-outline-info pr-2" href="{{route('showApplication', $application)}}">View</a>
                           <a class="btn btn-primary pr-2" href="{{route('reassignApplication', $application)}}">Reassign</a>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            @endcan

            <!-- End of admin view -->



            <!-- Start of Relationship Manager's and manager's view -->

            @can('manager-rm')
            <table id="default_ordering_table" class="display table table-striped table-bordered" style="width:100%">
               <thead>
                  <th scope="col">Application ID</th>
                  <th scope="col">Company</th>
                  <th scope="col">Created By</th>
                  <th scope="col">Status</th>
                  <th scope="col">Score</th>
                  <th scope="col">Assigned To</th>
                  <th scope="col">Created On</th>
                  <th scope="col">Last Updated</th>
                  <th class="pl-5" scope="col">Action</th>
               </thead>
               <tbody>
                  @foreach($applications as $application)
                  <tr>
                     <td scope="row">{{$application->application_id}} </td>
                     <td scope="row">{{App\Company::find($application->company_id)->name}} </td>
                     <td>{{App\User::find($application->created_by)->name}} </td>
                     <td>
                        @if($application->status == 'new')
                        <span class="badge indigo text-white p-1 m-2">New</span>
                        @elseif($application->status == 'pending')
                        <span class="badge orange text-white p-1 m-2">Pending</span>
                        @elseif($application->status == 'approved')
                        <span class="badge badge-success p-1 m-2">Approved</span>
                        @elseif($application->status == 'rejected')
                        <span class="badge badge-danger p-1 m-2">Rejected</span>
                        @elseif($application->status == 'aborted')
                        <span class="badge badge-warning p-1 m-2">Aborted</span>
                        @elseif($application->status == 'reviewing')
                        <span class="badge badge-dark p-1 m-2">Reviewing</span>
                        @endif
                     </td>
                     <td>
                        @if($application->score == 'hot')
                        <span class="badge orange text-white p-1 m-2">Hot</span>
                        @elseif($application->score == 'warm')
                        <span class="badge text-white p-1 m-2" style="background-color: lightsalmon;">Warm</span>
                        @elseif($application->score == 'cold')
                        <span class="badge teal text-white p-1 m-2">Cold</span>
                        @elseif($application->score == 'aborted')
                        <span class="badge badge-warning p-1 m-2">Aborted</span>
                        @elseif($application->score == 'rejected')
                        <span class="badge badge-danger p-1 m-2">Rejected</span>
                        @endif
                     </td>
                     <td>{{App\User::find($application->user_id)->name}}</td>
                     <td>{{$application->created_at->format('d M y  h:i A')}} </td>
                     <td>{{$application->updated_at->format('d M y  h:i A')}} </td>
                     <td>
                        <div class="col text-center">
                           <div class="btn-group">
                              <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <span class="_dot _inline-dot"></span>
                                 <span class="_dot _inline-dot"></span>
                                 <span class="_dot _inline-dot"></span>
                              </button>
                              <div class="dropdown-menu" x-placement="bottom-start">
                                 <a class="dropdown-item" href="{{route('showApplication', $application)}}">View</a>
                                 <a class="dropdown-item" href="{{route('listChecklist', $application)}}">Checklist</a>
                                 @if ($application->status == 'rejected' || $application->status == 'approved' || $application->status == 'aborted')
                                 <a class="dropdown-item" hidden href="{{route('editApplication', $application)}}">Edit</a>
                                 @else
                                 <a class="dropdown-item" href="{{route('editApplication', $application)}}">Edit</a>
                                 @endif
                                 @can('manager-priv')
                                 <a class="dropdown-item" href="{{route('reassignApplication', $application)}}">Reassign</a>
                                 @endcan
                                 @if($application->status == 'new')
                                 <div class="dropdown-divider"></div>
                                 <form method="POST" action="{{ route('deleteApplication', $application) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item submit-btn text-danger" data-type="delete">
                                       {{ __('Delete') }}
                                    </button>
                                 </form>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            @endcan

            <!-- End of Relationship Manager's and manager's view -->


            <!-- Start of Active Approver's view -->
            @can('approver-priv')
            <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="pills-pending-tab" data-toggle="pill" href="#pills-pending" role="tab" aria-controls="pills-pending" aria-selected="true">Pending</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="pills-completed-tab" data-toggle="pill" href='#pills-completed' role="tab" aria-controls="pills-completed" aria-selected="false">Completed</a>
               </li>
            </ul>
            <div class="tab-content ul-tab__content" id="pills-tabContent">
               <div class="tab-pane fade show active" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">
                  <table id="default_ordering_table" class="display table table-striped table-bordered" style="width:100%">
                     <thead>
                        <th class="pl-4" scope="col">Application ID</th>
                        <th scope="col">Company</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Score</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Created On</th>
                        <th scope="col">Last Updated</th>
                        <th class="pl-4" scope="col">Action</th>
                     </thead>
                     <tbody>
                        @foreach($applications as $application)
                        <tr>
                           <td scope="row">{{$application->application_id}}</td>
                           <td scope="row">{{App\Company::find($application->company_id)->name}} </td>
                           <td>{{App\User::find($application->created_by)->name}} </td>
                           <td>
                              @if($application->status == 'new')
                              <span class="badge indigo text-white p-1 m-2">New</span>
                              @elseif($application->status == 'pending')
                              <span class="badge orange text-white p-1 m-2">Pending</span>
                              @elseif($application->status == 'approved')
                              <span class="badge badge-success p-1 m-2">Approved</span>
                              @elseif($application->status == 'rejected')
                              <span class="badge badge-danger p-1 m-2">Rejected</span>
                              @elseif($application->status == 'aborted')
                              <span class="badge badge-warning p-1 m-2">Aborted</span>
                              @elseif($application->status == 'reviewing')
                              <span class="badge badge-dark p-1 m-2">Reviewing</span>
                              @endif
                           </td>
                           <td>
                              @if($application->score == 'hot')
                              <span class="badge orange text-white p-1 m-2">Hot</span>
                              @elseif($application->score == 'warm')
                              <span class="badge text-white p-1 m-2" style="background-color: lightsalmon;">Warm</span>
                              @elseif($application->score == 'cold')
                              <span class="badge teal text-white p-1 m-2">Cold</span>
                              @elseif($application->score == 'aborted')
                              <span class="badge badge-warning p-1 m-2">Aborted</span>
                              @elseif($application->score == 'rejected')
                              <span class="badge badge-danger p-1 m-2">Rejected</span>
                              @endif
                           </td>
                           <td>{{App\User::find($application->user_id)->name}}</td>
                           <td>{{$application->created_at->format('d M y  h:i A')}} </td>
                           <td>{{$application->updated_at->format('d M y  h:i A')}} </td>
                           <td>
                              <div class="text-center">
                                 <a class="btn btn-outline-info" href="{{route('showApplication', $application)}}">View</a>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-completed-tab">
                  <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                     <thead>
                        <th scope="col">Application ID</th>
                        <th scope="col">Company</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Approved By</th>
                        <th scope="col">Rejected By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Score</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Created On</th>
                        <th scope="col">Last Updated</th>
                        <th class="pl-4" scope="col">Action</th>
                     </thead>
                     <tbody>
                        @foreach($oldApps as $oldApp)
                        <tr>
                           <td scope="col">{{$oldApp->application_id}}</td>
                           <td scope="row">{{App\Company::find($oldApp->company_id)->name}} </td>
                           <td>{{App\User::find($oldApp->created_by)->name}} </td>
                           @if(is_numeric($oldApp->approvers->first()->pivot->approved_by))
                           <td>
                              {{App\User::find($oldApp->approvers->first()->pivot->approved_by)->name}}
                           </td>
                           @else
                           <td>
                              {{$oldApp->approvers->first()->pivot->approved_by}}
                           </td>
                           @endif
                           @if(is_numeric($oldApp->approvers->first()->pivot->rejected_by))
                           <td>
                              {{App\User::find($oldApp->approvers->first()->pivot->rejected_by)->name}}
                           </td>
                           @else
                           <td>
                              {{$oldApp->approvers->first()->pivot->rejected_by}}
                           </td>
                           @endif
                           <td>
                              @if($oldApp->status == 'new')
                              <span class="badge indigo text-white p-1 m-2">New</span>
                              @elseif($oldApp->status == 'pending')
                              <span class="badge orange text-white p-1 m-2">Pending</span>
                              @elseif($oldApp->status == 'approved')
                              <span class="badge badge-success p-1 m-2">Approved</span>
                              @elseif($oldApp->status == 'rejected')
                              <span class="badge badge-danger p-1 m-2">Rejected</span>
                              @elseif($oldApp->status == 'reviewing')
                              <span class="badge badge-dark p-1 m-2">Reviewing</span>
                              @elseif($oldApp->status == 'aborted')
                              <span class="badge badge-warning p-1 m-2">Aborted</span>
                              @endif
                           </td>
                           <td>
                              @if($oldApp->score == 'hot')
                              <span class="badge orange text-white p-1 m-2">Hot</span>
                              @elseif($oldApp->score == 'warm')
                              <span class="badge text-white p-1 m-2" style="background-color: lightsalmon;">Warm</span>
                              @elseif($oldApp->score == 'cold')
                              <span class="badge teal text-white p-1 m-2">Cold</span>
                              @elseif($oldApp->score == 'aborted')
                              <span class="badge badge-warning p-1 m-2">Aborted</span>
                              @elseif($oldApp->score == 'rejected')
                              <span class="badge badge-danger p-1 m-2">Rejected</span>
                              @endif
                           </td>
                           <td>{{App\User::find($oldApp->user_id)->name}}</td>
                           <td>{{$oldApp->created_at->format('d M y  h:i A')}} </td>
                           <td>{{$oldApp->updated_at->format('d M y  h:i A')}} </td>
                           <td>
                              <div class="text-center">
                                 <a class="btn btn-outline-info" href="{{route('showApplication', $oldApp)}}">View</a>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            @endcan
            <!-- End of Active Approver's view -->



         </div>
      </div>
   </div>
</div>
@endsection

@push('page-js')
<script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/toastr.min.js')}}"></script>
@if(session('toast-success'))
<script>
   toastr.success("{{session('toast-success')}}", "Success", {
      timeOut: "5000",
   });
</script>
@endif
<script>
   $(document).ready(function() {
      $('#default_ordering_table').DataTable({
         "order": [
            [6, "desc"]
         ]
      });

      $('#zero_configuration_table').DataTable({
         "order": [
            [7, "desc"]
         ]
      });
   })
</script>
<script>
   //sweet alert script for the submit delete approval buttons
   $(document).ready(function() {
      $('.submit-btn').on('click', function(e) {
         e.preventDefault();
         var form = $(this).closest('form');
         var successMsg1;
         var successMsg2;
         var cancelMsg;
         switch ($(this).attr('data-type')) {
            case 'submit':
               successMsg1 = 'Submitted!';
               successMsg2 = 'Your Application has been submitted for approval.';
               cancelMsg = 'Your Application is not submitted.';
               break;
            case 'delete':
               successMsg1 = 'Deleted!';
               successMsg2 = 'Your Application has been Deleted.';
               cancelMsg = 'Your Application is not Deleted.';
               break;
            case 'approve':
               successMsg1 = 'Approved!';
               successMsg2 = 'This Application has been approved by you.';
               cancelMsg = 'Your Application is not approved.';
               break;
            case 'reject':
               successMsg1 = 'Rejected!';
               successMsg2 = 'This Application has been rejected by you.';
               cancelMsg = 'Your Application is not rejected.';
               break;

         }
         swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0CC27E',
            cancelButtonColor: '#FF586B',
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
         }).then(function(isConfirm) {
            if (isConfirm) {
               form.submit();
            }
         }, function(dismiss) {
            // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            if (dismiss === 'cancel' || dismiss === 'overlay') {
               swal(
                  'Cancelled',
                  cancelMsg,
                  'error'
               ).catch(swal.noop)
            }
         })
      });

   })
</script>
@endpush