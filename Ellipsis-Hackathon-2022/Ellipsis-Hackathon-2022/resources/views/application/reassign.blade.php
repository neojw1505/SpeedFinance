@extends('layouts.master')

@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Reassign</h1>
    <ul>
        <li><a href="{{route('viewCompany')}}">Company</a></li>
        <li><a href="{{route('showCompany', $application->company)}}">{{$application->company->name}}</a></li>
        <li>Reassign Application</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reassign') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateAssignment', $application) }}" id="assignForm">
                        @csrf
                        @method('PUT')
                        <div class = 'form-group row'>
                            <label class="col-md-4 col-form-label text-md-right" for="userSelect">Choose Relationship Manager</label>
                            <div class="col-md-6">
                                <select class="custom-select form-control" name="user" id="userSelect">
                                    @foreach($users as $user)
                                        <option value={{$user->id}}  {{$application->user_id == $user->id ? 'selected' : ''}}>{{$user->name}} ({{$user->email}})</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary ladda-button submit-button m-1" data-style="expand-left"><span class="ladda-label">Reassign</span></button>

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
        var form = $('#assignForm')[0];
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

@section('bottom-js')
@endsection
