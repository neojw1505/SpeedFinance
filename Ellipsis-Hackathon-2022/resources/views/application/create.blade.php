@extends('layouts.master')

@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Create Application</h1>
    <ul>
        <li><a href="{{route('viewCompany')}}">Company</a></li>
        <li><a href="{{route('loadCreate')}}">Create Application</a></li>
        <li>Choose Checklists</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Application Checklist') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeApplication', $company) }}" id="createForm">
                        @csrf
                        @foreach($appDetails as $key => $value)
                        <input type="hidden" name='appDetails[{{$key}}]' value="{{$value}}">
                        @endforeach
                        <div class='form-group row'>
                            <label class="col-md-4 col-form-label text-md-right" for="scoreSelect">Score</label>
                            <div class="col-md-6">
                                <select class="custom-select form-control" name="score" id="statusSelect">
                                    <option value="hot">Hot</option>
                                    <option value="warm">Warm</option>
                                    <option value="cold">Cold</option>
                                </select>
                            </div>
                            @error('score')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class='form-group row m-0' style="justify-content:center;">
                            <label class="col-form-label text-md-right m-0" for="checklistSelect">Mandatory Checklists</label>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-8">
                                @foreach($mandatoryChecklists as $mandatoryChecklist)
                                <label class="checkbox checkbox-info">
                                    <input type="checkbox" id='check{{$mandatoryChecklist->id}}' name="checklist[]" checked onclick="return false;" value={{$mandatoryChecklist->id}}>
                                    <span>{{$mandatoryChecklist->name}}</span>
                                    <span class="checkmark"></span>
                                </label>
                                @endforeach
                                @if (count($mandatoryChecklists) <= 0) <span>No Mandatory Checklist selected. Select at least one to proceed !</span>
                                    @endif
                            </div>
                        </div>

                        <div class='form-group row m-0' style="justify-content: center;">
                            <label class="col-form-label text-md-right" for="checklistSelect">Optional</label>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-8">
                                @foreach($otherChecklists as $otherChecklist)
                                @if($otherChecklist->isMandatory == false)
                                <label class="checkbox checkbox-info">
                                    <input type="checkbox" id='check{{$otherChecklist->id}}' name="checklist[]" value={{$otherChecklist->id}}>
                                    <span>{{$otherChecklist->name}}</span>
                                    <span class="checkmark"></span>
                                </label>
                                @endif
                                @endforeach
                            </div>
                        </div><br>

                        <div class="form-group row" style="justify-content: center;">
                            @if (count($mandatoryChecklists) > 0)
                            <button type="submit" class="btn btn-primary ladda-button submit-button m-1" data-style="expand-left"><span class="ladda-label">Create</span></button>
                            @elseif (count($mandatoryChecklists) <= 0) <button type="submit" class="btn btn-primary ladda-button submit-button" disabled data-style="expand-left"><span class="ladda-label">Create</span></button>
                                @endif
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
            var form = $('#createForm')[0];
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