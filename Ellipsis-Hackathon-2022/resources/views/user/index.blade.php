@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/toastr.css')}}">

@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Users</h1>
    <ul>
        <li>Users</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="pb-4 pl-3">
    <a class="btn btn-primary" href="{{ route('createForm') }}" role="button">Create User</a><br>
</div>
<div class="col-md-12 mb-4">
    <div class="card text-left">
        <div class="card-body">
            <div class="table-responsive">


                <!-- Start of Manager and Admin's view -->
                @can('admin-manager')
                    <table id="default_ordering_table" class="display table table-striped table-bordered" style="width:100%">
                            <thead>

                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Last login</th>
                                <th class="pl-5" scope="col">Action</th>

                            </thead>

                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td scope="row">{{$user->name}} </td>
                                        <td>{{$user->email}} </td>
                                        <td>
                                            @if($user->roles->first()->name == 'manager')
                                                Manager
                                            @elseif($user->roles->first()->name == 'rm')
                                                Relationship Manager
                                            @endif 
                                        </td>
                                        @if ( $user->banned == true)
                                            <td class="text-danger">Disabled</td>
                                        @else
                                            <td class="text-success">Enabled</td>
                                        @endif
                                        <td>
                                            @if(isset($user->last_login)) 
                                                {{ $user->last_login->format('d M y  h:i A') }}
                                            @else
                                                New
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="pr-2">
                                                    <a class="btn btn-outline-info" href="{{route('editUser', $user)}}" role="button">Edit</a>
                                                </div>
                                                @if ( $user->banned == true)
                                                    <a class="btn btn-outline-success" href="{{route('banUser', $user)}}" role="button">Enable</a>
                                                @else
                                                    <a class="btn btn-outline-danger" href="{{route('banUser', $user)}}" role="button">Disable</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @foreach($approvers as $approver)
                                    <tr>
                                        <td scope="row">{{$approver->name}} </td>
                                        <td>{{$approver->email}} </td>
                                        <td>Approver</td>
                                        @if ($approver->banned == true)
                                            <td class="text-danger">Disabled</td>
                                        @else
                                            <td class="text-success">Enabled</td>
                                        @endif
                                        <td>
                                            @if(isset($approver->last_login)) 
                                                {{ $approver->last_login->format('d M y  h:i A') }}
                                            @else
                                                New
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="pr-2">
                                                <div class="pt-1"></div>
                                                <a class="btn btn-outline-info" href="{{route('editUser', $approver)}}" role="button">Edit</a>
                                                </div>
                                                <div class="pr-2">
                                                <div class="pt-1"></div>
                                                @if ($approver->banned == true)    
                                                    <a class="btn btn-outline-success" href="{{route('banUser', $approver)}}" role="button">Enable</a>
                                                @else
                                                    <a class="btn btn-outline-danger" href="{{route('banUser', $approver)}}" role="button">Disable</a>
                                                @endif
                                                </div>
                                                <form method="POST" action="{{ route('removeApprover', $approver) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ladda-button submit-button m-1" data-style="expand-left"><span class="ladda-label">Deactivate</span></button>

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @foreach($notActives as $notActive)
                                    <tr>
                                        <td scope="row">{{$notActive->name}} </td>
                                        <td>{{$notActive->email}} </td>
                                        <td>Approver</td>
                                        @if ( $notActive->banned == true)
                                            <td class="text-danger">Disabled</td>
                                        @else
                                            <td class="text-success">Enabled</td>
                                        @endif
                                        <td>
                                            @if(isset($notActive->last_login)) 
                                                {{ $notActive->last_login->format('d M y  h:i A') }}
                                            @else
                                                New
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="pr-2">
                                                    <div class="pt-1"></div>
                                                    <a class="btn btn-outline-info" href="{{route('editUser', $notActive)}}" role="button">Edit</a>
                                                </div>
                                                <div class="pr-2">
                                                    <div class="pt-1"></div>
                                                    @if ($notActive->banned == true)    
                                                        <a class="btn btn-outline-success" href="{{route('banUser', $notActive)}}" role="button">Enable</a>
                                                    @else
                                                        <a class="btn btn-outline-danger" href="{{route('banUser', $notActive)}}" role="button">Disable</a>
                                                    @endif
                                                </div>
                                                <form method="POST" action="{{ route('addApprover', $notActive) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success ladda-button submit-button m-1" data-style="expand-left"><span class="ladda-label">Activate</span></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endcan
                    <!-- End of Manager and Admin's View -->

               </div>
            </div>
         </div>
      </div>
@endsection
@push('page-js')
    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>
    <script src="{{asset('assets/js/vendor/toastr.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/spin.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/ladda.js')}}"></script>
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
    $(document).ready(function(){
        $('.submit-button').on('click', function(e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            var form = $(this).closest('form');
            l.start();
            form.submit();
        });

    });
    </script>
@endpush
