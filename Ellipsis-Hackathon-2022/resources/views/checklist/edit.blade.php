@extends('layouts.master')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Edit Checklist</h1>
    <ul>
        <li><a href="{{route('viewChecklist')}}">Checklist</a></li>
        <li>Edit Checklist</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h4 class=" pt-1">Edit {{$checklist->name}}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateChecklist', $checklist) }}" id="updateChecklist">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Checklist Name') }}</label>

                            <div class="col-md-6">
                                <input id="checklist-name" type="text" value="{{$checklist->name}}" class="form-control" name="name" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <select class="form-select form-select-lg mt-2" name="category" required>
                                    <!-- pre filled category -->
                                    <option value="{{$checklist->category}}">{{$checklist->category}}</option>
                                    <!-- loop through all other categories that was not pre filled -->
                                    @foreach ($categories as $category)
                                    <option value="{{$category}}">{{$category}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Checklist Type') }}</label>
                            <div class="form-check">
                                @if ($checklist->isMandatory == 1)
                                <input class="form-check-input" type="checkbox" value="" name="checklistType" id="flexCheckDefault" checked>
                                @else
                                <input class="form-check-input" type="checkbox" value="" name="checklistType" id="flexCheckDefault">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">Mandatory</label>
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
    $(document).ready(function() {
        $('.submit-button').on('click', function(e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            var form = $('#editForm')[0];
            if (form.checkValidity() == true) {
                l.start();
                form.submit();
            } else {
                l.stop();
            }
        });

    });
</script>
@endpush

@section('bottom-js')
@endsection