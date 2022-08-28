@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/toastr.css') }}">
<style>
    #upcoming_details {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
    }
</style>
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Show Application</h1>
    <ul>
        @canany(['admin-manager', 'manager-rm'])
        <li><a href="{{ route('viewCompany') }}">Company</a></li>
        <li><a href="{{ route('showCompany', $application->company) }}">{{ $application->company->name }}</a></li>
        @endcan
        <li><a>{{$application->application_id}}</a></li>
        <li>Show Application</li>

    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<!-- Start Info Section -->

<div class="col-md-12 mb-4">
    @can('manager-priv')
    @if ($application->status != 'new')
    <button type="button" class="btn btn-primary mb-4" onclick="window.location='{{ route('viewCreditMemo', $application) }}'">
        {{ __('Generate Credit Memo') }}
    </button>
    @endif
    @endcan
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h3>{{ $application->application_id }}</h3>
                @can('approver-priv')
                @if ($pivot->status == 'pending')
                <div class="d-flex justify-content-end">
                    <form method="POST" action="{{ route('approveApplication', $application) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success btn-rounded submit-btn mr-2" data-type="approve">
                            {{ __('Approve') }}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('rejectApplication', $application) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger btn-rounded submit-btn" data-type="reject">
                            {{ __('Reject') }}
                        </button>
                    </form>
                </div>
                @endif
                @endcan
                @can('rm-priv')
                @if ($application->status == 'new')
                <div class="justify-content-end d-flex">
                    <form method="POST" action="{{ route('submitReview', $application) }}">
                        @csrf
                        <button class="btn btn-success btn-rounded submit-btn" data-type="submit">
                            {{ __('Submit For Review') }}
                        </button>
                    </form>
                </div>
                @endif
                @endcan
                @can('manager-priv')
                @if ($application->status == 'reviewing')
                <div class="justify-content-end d-flex">
                    <form method="POST" action="{{ route('submitApproval', $application) }}">
                        @csrf
                        <button class="btn btn-success btn-rounded submit-btn mx-1" data-type="approve">
                            {{ __('Submit For Approval') }}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('abortApplication', $application) }}">
                        @csrf
                        <button class="btn btn-danger btn-rounded submit-btn d-flex mx-1" data-type="abort">
                            {{ __('Abort') }}
                        </button>
                    </form>
                </div>
                @endif
                @endcan
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 col-6">
                    <div class="mb-3">
                        <p class="text-primary mb-1"><i class="i-ID-Card text-16 mr-1"></i>Score</p>
                        @if ($application->score == 'hot')
                        <span class="badge text-white p-1 m-2" style="background-color: orange;">Hot</span>
                        @elseif($application->score == 'warm')
                        <span class="badge text-white p-1 m-2" style="background-color: lightsalmon;">Warm</span>
                        @elseif($application->score == 'cold')
                        <span class="badge teal text-white p-1 m-2">Cold</span>
                        @elseif($application->score == 'aborted')
                        <span class="badge badge-warning p-1 m-2">Aborted</span>
                        @elseif($application->score == 'rejected')
                        <span class="badge badge-danger text-white p-1 m-2">Rejected</span>
                        @endif
                    </div>
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Edit-Map text-16 mr-1"></i>Interest Rate (%)</p>
                        <span>@money($application->interest) {{ $application->interest_type }}</span>
                    </div>
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Business-ManWoman text-16 mr-1"></i> Created By</p>
                        <span>{{ App\User::find($application->created_by)->name }}</span>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Dec text-16 mr-1"></i>Date Created</p>
                        <span>{{ $application->created_at->format('d M y  h:i A') }}</span>
                    </div>
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-File-Clipboard-File--Text text-16 mr-1"></i>Status</p>
                        @if ($application->status == 'new')
                        <span class="badge indigo text-white p-1 m-2">New</span>
                        @elseif($application->status == 'pending')
                        <span class="badge orange text-white p-1 m-2">Pending</span>
                        @elseif($application->status == 'approved')
                        <span class="badge badge-success p-1 m-2">Approved</span>
                        @elseif($application->status == 'rejected')
                        <span class="badge badge-danger p-1 m-2">Rejected</span>
                        @elseif($application->status == 'reviewing')
                        <span class="badge badge-dark p-1 m-2">Reviewing</span>
                        @elseif($application->status == 'aborted')
                        <span class="badge badge-warning p-1 m-2">Aborted</span>
                        @endif
                    </div>
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Dollar-Sign text-16 mr-1"></i> Loan Amount ($)</p>
                        <span>@money($application->loan_amt)</span>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Money-Bag text-16 mr-1"></i> Origination Fee ($)</p>
                        <span>@money($application->origination_fee)</span>
                    </div>
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Calendar-3 text-16 mr-1"></i> Loan Tenure (Months)</p>
                        <span>{{ $application->loan_tenure }}</span>
                    </div>
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Pen-2 text-16 mr-1"></i> Date Updated</p>
                        <span>{{ $application->updated_at->format('d M y  h:i A') }}</span>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Professor text-16 mr-1"></i>Loan Type</p>
                        <span>{{ $application->loan_type }}</span>
                    </div>
                </div>
                @if (isset($application->consultant_company))
                <div class="col-md-4 col-6">
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 mr-1"></i>Consultant's Company
                        </p>
                        <span>{{ $application->consultant_company }}</span>
                    </div>
                </div>
                @endif
                @if (isset($application->consultant_name))
                <div class="col-md-4 col-6">
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Professor text-16 mr-1"></i>Consultant's Name</p>
                        <span>{{ $application->consultant_name }}</span>
                    </div>
                </div>
                @endif
                @if (isset($application->consultant_contact))
                <div class="col-md-4 col-6">
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Home1 text-16 mr-1"></i>Consultant's Contact</p>
                        <span>{{ $application->consultant_contact }}</span>
                    </div>
                </div>
                @endif
                @if (!empty($application->remark))
                <div class="col-md-4 col-6">
                    <div class="mb-4">
                        <p class="text-primary mb-1"><i class="i-Home1 text-16 mr-1"></i>Remark</p>
                        <span>{{ $application->remark }}</span>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- End of Info Section -->


<div class="row">
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-0 ml-4">
                        <i class="i-File-Edit"></i>
                        <span>Notes</span>
                        @can('manager-rm')
                        <a class=" shadow-none" href="{{ route('createNote', $application) }}" role="button"><i class="i-Add"></i></a><br>
                        @endcan
                    </div>
                    @if (count($notes) == 0)
                    <div class="text-center">No data available</div>
                    @endif
                    @foreach ($notes as $note)
                    <div class="card  mt-3">
                        <div class="card-body">
                            <h6 class="heading">
                                <div class="row align-items-center justify-content-between">
                                    <div class="d-flex justify-content-center ml-4">
                                        <span class=" font-weight-normal"><i class="i-Administrator mr-1"></i></span>
                                        {{ App\User::find($note->updated_by)->name }}
                                        <span class="text-mute font-weight-normal ml-2">{{ $note->updated_at->format('d M y  h:i A') }}</span>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        @can('manager-rm')
                                        <div class="d-flex justify-content-end mr-3">
                                            <a class="btn btn-sm btn-primary btn-rounded mr-2" href="{{ route('editNote', $note) }}" role="button">Edit</a>
                                            <form method="POST" class="float-right" action="{{ route('deleteNote', $note) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-rounded btn-sm submit-btn" data-type="deleteNote">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                        @endcan
                                    </div>
                                </div>
                            </h6>
                            <p class="mb-2">{{ $note->detail }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- REMINDERS SECTION-->
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title ml-4">
                        <i class="i-Bell"></i>
                        <span>Reminders</span>
                        @can('manager-rm')
                        <a class="shadow-none" href="{{ route('createReminder', $application) }}" role="button"><i class="i-Add"></i></a><br>
                        @endcan
                        <div>
                            <!-- REMINDERS TAB -->
                            <ul class="nav nav-tabs my-2" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="upcoming-reminders-tab" data-toggle="tab" href="#upcoming-reminders" role="tab" aria-controls="upcoming-reminders" aria-selected="false">Upcoming</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="past-reminders-tab" data-toggle="tab" href="#past-reminders" role="tab" aria-controls="past-reminders" aria-selected="true">Past</a>
                                </li>
                            </ul>
                            <!-- END OF REMINDERS TAB -->

                            <div class="tab-content" id="nav-tabContent" style="padding: 0%;">

                                <!-- INDIVIDUAL UPCOMING REMINDER CARD -->
                                <div class="tab-pane fade show active" id="upcoming-reminders" role="tabpanel" aria-labelledby="nav-upcoming-reminders-tab">
                                    @if (count($upcomingReminders) == 0)
                                    <span> No Upcoming Reminders.</span>
                                    @endif (count($upcomingReminders) != 0)
                                    @foreach ($upcomingReminders as $upcomingReminder)
                                    <div class="card mb-3 mt-4" style="height: 200px; width:auto">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3 text-center">
                                                    <span class="h4 font-weight-bold">{{ $upcomingReminder->dateTime->format('D') }}</span><br>
                                                    <span class="h1 font-weight-bold">{{ $upcomingReminder->dateTime->format('d') }}</span><br>
                                                    <span class="h6 font-weight-bold">{{ $upcomingReminder->dateTime->format('M Y') }}</span><br>
                                                    <span class="h6 font-weight-bold">{{ $upcomingReminder->dateTime->format('h:i A') }}</span><br>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div>
                                                        <p id="upcoming_reminder_title" class="m-0"><strong>{{ $upcomingReminder->title }}</strong></p>
                                                    </div>
                                                    <div>
                                                        <p class="mb-2" id='upcoming_details'>
                                                        <h6><i>{{ $upcomingReminder->detail }}</i></h6>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <div class="row align-items-center justify-content-end">
                                                        <div class="d-flex justify-content-end">
                                                            @can('manager-rm')
                                                            <div class="d-flex justify-content-end mr-3">
                                                                <a class="btn btn-sm btn-primary btn-rounded mr-2" href="{{ route('editReminder', $upcomingReminder) }}" role="button">Edit</a>
                                                                <form method="POST" class="float-right" action="{{ route('deleteReminder', $upcomingReminder) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-rounded btn-sm submit-btn" data-type="deleteNote">
                                                                        {{ __('Delete') }}
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end ml-auto mb-auto">
                                                    <span class=" font-weight-normal mr-3"><i class="i-Administrator mr-1"></i>{{ App\User::find($upcomingReminder->updated_by)->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div style="text-align:center;"><a href="{{route('loadCalendar')}}" class="btn btn-outline-dark mt-2" style="font-size: 16px;">View More <i class="fas fa-ellipsis-h"></i></a></div>
                                </div>
                                <!-- END OF UPCOMING REMINDER CARD -->

                                <!-- INDIVIDUAL PAST REMINDER CARD -->
                                <div class="tab-pane fade" id="past-reminders" role="tabpanel" aria-labelledby="nav-past-reminders-tab">
                                    @if (count($pastReminders) == 0)
                                    <span> No Past Reminders.</span>
                                    @endif (count($pastReminders) != 0)
                                    @foreach ($pastReminders as $pastReminder)
                                    <div class="card mb-3 mt-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3 text-center">
                                                    <span class="h4 font-weight-bold">{{ $pastReminder->dateTime->format('D') }}</span><br>
                                                    <span class="h1 font-weight-bold">{{ $pastReminder->dateTime->format('d') }}</span><br>
                                                    <span class="h6 font-weight-bold">{{ $pastReminder->dateTime->format('M Y') }}</span><br>
                                                    <span class="h6 font-weight-bold">{{ $pastReminder->dateTime->format('h:i A') }}</span><br>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div>
                                                        <p id="upcoming_reminder_title" class="m-0"><strong>{{ $pastReminder->title }}</strong></p>
                                                    </div>
                                                    <div>
                                                        <p class="mb-2" id='upcoming_details'>
                                                        <h6><i>{{ $pastReminder->detail }}</i></h6>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <div class="row align-items-center justify-content-end">

                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end ml-auto mb-auto">
                                                    <span class=" font-weight-normal mr-3"><i class="i-Administrator mr-1"></i>{{ App\User::find($pastReminder->updated_by)->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div style="text-align:center;"><a href="{{route('loadCalendar')}}" class="btn btn-outline-dark mt-2" style="font-size: 16px;">View More <i class="fas fa-ellipsis-h"></i></a></div>
                                </div>
                                <!-- END OF PAST REMINDER CARD -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF REMINDERS SECTION -->

    <div class="col-lg-12 col-xl-12 mt-4">
        <div class="card text-left">
            <div class="card-body">
                <div class="card-title mb-0 ml-4">Uploaded Files</div>
                <div class="table-responsive">
                    <div class="tab-content ul-tab__content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-uploaded" role="tabpanel" aria-labelledby="pills-uploaded-tab">
                            <div class="col-md-6 mx-auto text-center">
                                @if (count($uploaded) == 0)
                                <div class="text-center">No data available</div>
                                @endif
                                @foreach ($uploaded as $checklists)
                                <label class="font-weight-bold" for='{{ $checklists->checklist_id }}'>{{ $checklists->checklists->name }}</label><br>
                                <div class="text-center">
                                    @foreach ($checklists->files as $file)
                                    <div class="d-flex justify-content-center">
                                        <span class="pr-3">{{ $file->name }}</span>
                                        <div>
                                            <a class="btn btn-light btn-rounded " target="_blank" href="{{ route('viewFile', $file) }}"><i class="i-Download-from-Cloud">
                                                </i></a>
                                        </div>
                                        <br>
                                        <div class="pb-3"></div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection


    @push('page-js')
    <script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.script.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/toastr.min.js') }}"></script>

    @if (session('toast-success'))
    <script>
        toastr.success("{{ session('toast-success') }}", "Success", {
            timeOut: "5000",
        });
    </script>
    @endif
    @if (session('toast-error'))
    <script>
        toastr.error("{{ session('toast-error') }}", "Error", {
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
                    cancelMsg = 'Application is not Submitted';
                    break;
                case 'deleteNote':
                    titleMsg = 'Are you sure you want to Delete?';
                    cancelMsg = 'Note is not Deleted';
                    break;
                case 'delete':
                    titleMsg = 'Are you sure you want to Delete?';
                    cancelMsg = 'Application is not Deleted';
                    break;
                case 'deleteReminder':
                    titleMsg = 'Are you sure you want to Delete?';
                    cancelMsg = 'Reminder is not Deleted';
                    break;
                case 'approve':
                    titleMsg = 'Are you sure you want to Approve?';
                    cancelMsg = 'Application is not Approved';
                    break;
                case 'abort':
                    titleMsg = 'Are you sure you want to Abort?';
                    cancelMsg = 'Application is not Aborted';
                    break;
                case 'reject':
                    titleMsg = 'Are you sure you want to Reject?';
                    cancelMsg = 'Application is not Rejected';
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