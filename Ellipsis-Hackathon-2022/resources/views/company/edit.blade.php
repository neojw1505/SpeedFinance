@extends('layouts.master')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Company</h1>
    <ul>
        <li><a href="{{route('viewCompany')}}">Company</a></li>
        <li>Edit Company</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{$company->name}}'s Details</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateCompany', $company) }}" id="editForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $company->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="uen" class="col-md-4 col-form-label text-md-right">{{ __('UEN number') }}</label>

                            <div class="col-md-6">
                                <input id="uen" type="uen" class="form-control @error('uen') is-invalid @enderror" name="uen" value="{{ old('uen', $company->uen) }}" required autocomplete="uen">

                                @error('uen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $company->address) }}" required autocomplete="new-address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Industry') }}</label>
                            <div class="col-md-6">
                                <select class="custom-select" name="industry" required>
                                    <option value="{{$company->industries->id}}">{{$company->industries->name}}</option>
                                @foreach ($industries as $k => $industry)
                                    <option value="{{$industries[$k]->id}}">{{$industries[$k]->name}}</option>
                                {{ $k++ }}
                                @endforeach
                                </select>

                                @error('industry')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gst" class="col-md-4 col-form-label text-md-right">{{ __('Gst Registered') }}</label>
                            <div class="row" style="align-items: center;">
                                <div class="row-item ml-4" style="display: inline-flex;">
                                    <label class="radio radio-primary mx-2">
                                        <span>Yes</span>
                                        <input type="radio" name="gst" value="1" <?php if($company->gst_registered == 1){echo "checked";} ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio radio-primary mx-2">
                                        <span>No</span>
                                        <input type="radio" name="gst" value="0" <?php if($company->gst_registered == 0){echo "checked";} ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                @error('gst')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary ladda-button submit-button m-1" data-style="expand-left"><span class="ladda-label">Edit</span></button>

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
        var form = $('#editForm')[0];
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
