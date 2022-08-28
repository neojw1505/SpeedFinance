@extends('layouts.master')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection
@section('main-content')
<div class="breadcrumb">
    <h1>Confirm Ban/Unban</h1>
    <ul>
        <li><a href="{{route('viewUser')}}">Users</a></li>
        <li>Confirm Ban/Unban</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="alert alert-danger">
            @if ( $user->banned == true)
                Confirm Enable User?
                @else
                Confirm Disable User?
            @endif
          </div>
            <div class="card">
                <div class="card-header">{{ __('User Details') }}</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('changeBan', $user) }}" id="banForm">
                      @csrf
                      @method('PUT')

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} :</label>

                          <div class="col-md-6">
                            <label for="email" class="col-form-label text-md-right">{{ $user->name }}</label>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} :</label>

                          <div class="col-md-6">
                            <label for="email" class="col-form-label text-md-right">{{ $user->email }}</label>
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary ladda-button submit-button m-1" data-style="expand-left"><span class="ladda-label">Confirm</span></button>

                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('page-js')
<script src="{{asset('assets/js/vendor/spin.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/ladda.js')}}"></script>

<script>
    $(document).ready(function(){
    $('.submit-button').on('click', function(e) {
        var laddaBtn = e.currentTarget;
        var l = Ladda.create(laddaBtn);
        var form = $('#banForm')[0];
        if(form.checkValidity() == true) {
          l.start();
          form.submit();
        } else{
            l.stop(); 
        }
    });

});
</script>
@endpush