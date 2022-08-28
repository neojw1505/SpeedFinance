@extends('layouts.master')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/toastr.css')}}">
@endsection
@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin's Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@push('page-js')
<script src="{{asset('assets/js/vendor/toastr.min.js')}}"></script>
@if(session('toast-success'))
    <script>
        toastr.success("{{session('toast-success')}}", "Success", {
            timeOut: "5000",
        });    
    </script>
@endif
@endpush