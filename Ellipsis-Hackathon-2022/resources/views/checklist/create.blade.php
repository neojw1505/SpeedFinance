@extends('layouts.master')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection
@section('main-content')
<div class="breadcrumb">
    <h1>Create Checklist</h1>
    <ul>
        <li><a href="{{route('viewChecklist')}}">Checklist</a></li>
        <li>Create Checklist</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Checklist') }}</div>

                <div class="card-body">
                    <form method="POST" class = "pb-4" action="{{ route('addChecklist') }}" id="createForm">
                        @csrf
                        <div class="input-group mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <select class="custom-select" name="category" required>
                                    <option selected hidden value="">Select a category</option>
                                    <option value="Above 40k">Above 40k</option>
                                    <option value="GST">GST</option>
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Checklist Type') }}</label>
                            <div class="input-group-prepend" style="align-items:center;">
                                <input class="input-group-text ml-3" type="checkbox" value="" name="checklistType" id="flexCheckDefault">
                                <span class="ml-1">Mandatory</span>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0" style="justify-content: center;">
                            <div class="col-md-6 offset-md-4 mt-2">
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