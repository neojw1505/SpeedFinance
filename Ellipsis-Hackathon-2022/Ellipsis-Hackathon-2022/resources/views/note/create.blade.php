@extends('layouts.master')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection
@section('main-content')
<div class="breadcrumb">
    <h1>Create Note</h1>
    <ul>
        <li><a href="{{route('viewCompany')}}">Company</a></li>
        <li><a href="{{route('showCompany', $application->company)}}">{{$application->company->name}}</a></li>
        <li><a href="{{route('showApplication', $application)}}">Show Application</a></li>
        <li>Create Note</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Notes Creation') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeNote', $application) }}" id="createForm">
                        @csrf

                        <div class="form-group row">
                            <label for="detail" class="col-md-4 col-form-label text-md-right">{{ __('Details') }}</label>

                            <div class="col-md-6">
                                <textarea id="detail" class="form-control @error('detail') is-invalid @enderror" name="detail" cols="40" wrap="soft" value="{{ old('detail') }}" required autocomplete="detail" autofocus></textarea>
                                @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary ladda-button submit-button m-1" data-style="expand-left"><span class="ladda-label">Create</span></button>
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
        var form = $('#createForm')[0];
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