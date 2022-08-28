@extends('layouts.master')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/toastr.css')}}">
@endsection
@section('main-content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Audit Logs') }}</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="default_ordering_table" class="display table table-striped table-bordered" style="width:100%">
                        <thead>
                           <th scope="col">Log ID</th>
                           <th scope="col">User</th>
                           <th scope="col">Description</th>
                           <th scope="col">Action</th>
                           <th scope="col">Created On</th>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{$log->id}}</td>
                                    <td>{{$log->getExtraProperty('user')}}</td>
                                    <td>{{$log->description}}</td>
                                    <td>{{$log->getExtraProperty('action')}}</td>
                                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$log->created_at)->format('d M Y h:i A')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
@push('page-js')
<script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {
       $('#default_ordering_table').DataTable();
    })
 </script>
@endpush

