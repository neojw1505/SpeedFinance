@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/toastr.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Company</h1>
    <ul>
        <li><a href="{{route('viewCompany')}}">Company</a></li>
        <li>{{$company->name}}</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>


<section class="ul-contact-detail">
    <div class="row">
        <div class="col-lg-3 col-xl-3 pb-5">
            <div class="card">
                <img class="d-block w-100" src="{{ asset('assets/images/products/building.jpg') }}" alt="First slide">
                <div class="card-body">
                    <div class="ul-contact-detail__info">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="ul-contact-detail__info-1">
                                    <h5>Name</h5>
                                    <span>{{$company->name}}</span>
                                </div>
                                <div class="ul-contact-detail__info-1">
                                    <h5>Industry</h5>
                                    <span>{{$company->industries->name}}</span>
                                </div>
                                <div class="ul-contact-detail__info-1">
                                    <h5>Gst Registered</h5>
                                    <span>{{$company->gst_registered == 0 ? 'No' : 'Yes'}}</span>
                                </div>
                                <div class="ul-contact-detail__info-1">
                                    <h5>UEN</h5>
                                    <span>{{$company->uen}}</span>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="ul-contact-detail__info-1">
                                    <h5>Address</h5>
                                    <span>{{$company->address}}</span>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="ul-contact-detail__info-1">
                                    <h5>Date Created</h5>
                                    <span>{{$company->created_at->format('d M y | h:i A')}}</span>
                                </div>
                                <div class="ul-contact-detail__info-1">
                                    <h5>Date Updated</h5>
                                    <span>{{$company->updated_at->format('d M y | h:i A')}}</span>
                                </div>
                            </div>
                            @can('manager-rm')
                            <div class="col-12 text-center">
                                <a class="btn btn-outline-info mr-2" href="{{route('editCompany',$company )}}">Edit Company Details</a>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-xl-9">
            <div class="card text-left mb-3">
                <div class="card-body">
                    <div class="card-title">Applications</div>
                    <div class="table-responsive">
                        @if (session('message'))
                        <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                        @can('manager-rm')
                        <div class="pb-4 pl-3">
                            <a class="btn btn-primary" href="{{ route('loadCreate', $company) }}" role="button">Create New Application</a><br>
                        </div>
                        @endcan
                        <!-- Start of Applications Section  -->



                        <!-- Start of Admin and Manager view -->

                        @can('admin-priv')
                        <table id="default_ordering_table" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th scope="col">Application ID</th>
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

                                    <td scope="row">{{App\User::find($application->created_by)->name}} </td>
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
                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-outline-info mr-2" href="{{route('showApplication', $application)}}">View</a>
                                            <a class="btn btn-primary" href="{{route('reassignApplication', $application)}}">Reassign</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endcan

                        <!-- End of admin and manager's view -->



                        <!-- Start of Relationship Manager's view -->

                        @can('manager-rm')
                        <table id="default_ordering_table" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th scope="col">Application ID</th>
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

                                    <td scope="row">{{App\User::find($application->created_by)->name}} </td>
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
                                        <span class="badge text-white orange p-1 m-2" style="background-color: lightsalmon;">Warm</span>
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
                                                    @if ($application->status == 'rejected' || $application->status == 'approved')
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
                    </div>
                </div>
            </div>

            <!-- End of Relationship Manager's view -->



            <!-- End of Applications Section  -->


            <!-- Start of Contacts section -->
            <div class="card text-left">
                <div class="card-body">
                    <div class="card-title">Contacts</div>
                    <div class="table-responsive">

                        <!-- Start of Relationship Manager's view -->
                        @can('manager-rm')
                        <div class="pb-4 pl-3">
                            <a class="btn btn-primary" href="{{ route('createContact', $company) }}" role="button">Create Contact</a><br>
                        </div>
                        <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th class="pl-5" scope="col">Action</th>
                            </thead>

                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td scope="row">{{$contact->name}} </td>
                                    <td>{{$contact->mobile}} </td>
                                    <td>{{$contact->email}} </td>
                                    <td>{{$contact->title}} </td>
                                    <td>{{$contact->type}} </td>
                                    <td>
                                        <div class=" d-flex justify-content-center">
                                            <a class="btn btn-outline-info mr-2" href="{{route('editContact',$contact )}}">Edit</a>
                                            @if($contact->type !== 'Primary' || count($contact->company->contacts) == 1)
                                            <form method="POST" action="{{ route('deleteContact', $contact) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-type="deleteContact" class="btn btn-danger submit-btn">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endcan
                        <!-- End of Relationship Manager View -->

                        <!-- Start of Admin View (NO CRUD)-->
                        @can('admin-priv')
                        <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                            </thead>

                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td scope="row">{{$contact->name}} </td>
                                    <td>{{$contact->mobile}} </td>
                                    <td>{{$contact->email}} </td>
                                    <td>{{$contact->title}} </td>
                                    <td>{{$contact->type}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endcan
                        <!-- End of Admin View -->

                        <!-- End of Contacts section -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('page-js')
<script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/toastr.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#default_ordering_table').DataTable({
            "order": [
                [5, "desc"]
            ]
        });

        $('#zero_configuration_table').DataTable({
            "order": [

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
@if(session('toast-error'))
<script>
    toastr.error("{{session('toast-error')}}", "Error", {
        timeOut: "5000",
    });
</script>
@endif
<script>
    //sweet alert script for the submit delete approval buttons
    $('.submit-btn').on('click', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');
        var titleMsg;
        switch ($(this).attr('data-type')) {
            case 'submit':
                titleMsg = 'Are you sure you want to Submit?';
                cancelMsg = 'Application not Submitted';
                break;
            case 'delete':
                titleMsg = 'Are you sure you want to Delete?';
                cancelMsg = 'Application Not Deleted';
                break;
            case 'deleteContact':
                titleMsg = 'Are you sure you want to Delete?';
                cancelMsg = 'Contact Not Deleted';
                break;
            case 'approve':
                titleMsg = 'Are you sure you want to Approve?';
                cancelMsg = 'Application not Approved';
                break;
            case 'reject':
                titleMsg = 'Are you sure you want to Reject?';
                cancelMsg = 'Application not Submitted';
                break;
        }
        swal({
            title: titleMsg,
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
</script>
@endpush