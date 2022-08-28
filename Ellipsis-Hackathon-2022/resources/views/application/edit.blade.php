@extends('layouts.master')

@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Edit Application</h1>
    <ul>
        <li><a href="{{route('viewCompany')}}">Company</a></li>
        <li><a href="{{route('showCompany', $application->company)}}">{{$application->application_id}}</a></li>

        <li>Edit Application</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Application') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateApplication', $application) }}" id="editForm">
                        @csrf
                        @method('PUT')
                        <div class='form-group row'>
                            <label class="col-md-4 col-form-label text-md-right" for="scoreSelect">Score<text class="text-danger">*</text></label>
                            <div class="col-md-6">
                                <select class="custom-select form-control" name="score" id="statusSelect">
                                    <option value="hot" {{$application->score == 'hot' ? 'selected' : ''}}>Hot</option>
                                    <option value="warm" {{$application->score == 'warm' ? 'selected' : ''}}>Warm</option>
                                    <option value="cold" {{$application->score == 'cold' ? 'selected' : ''}}>Cold</option>
                                </select>
                            </div>
                            @error('score')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="loant" class="col-md-4 col-form-label text-md-right">{{ __('Loan Tenure (Months)') }}<text class="text-danger">*</text></label>
                            <div class="col-md-6">
                                <input id="loant" max="9999999" min="1" type="number" class="form-control @error('loant') is-invalid @enderror" name="loant" value="{{ old('loant', $application->loan_tenure) }}" required autocomplete="loant">
                                @error('loant')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="loanamt" class="col-md-4 col-form-label text-md-right">{{ __('Loan Amount ($)') }}<text class="text-danger">*</text></label>
                            <div class="col-md-6">
                                <input id="loanamt" min="1" max="9999999" type="number" step="0.01" class="form-control @error('loanamt') is-invalid @enderror" name="loanamt" value="{{ old('loanamt', $application->loan_amt) }}" required autocomplete="loanamt">
                                @error('loanamt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="interest" class="col-md-4 col-form-label text-md-right">{{ __('Interest Rate (%)') }}<text class="text-danger">*</text></label>
                            <div class="col-md-3">
                                <input id="interest" type="number" step="0.01" min="0.01" value="{{$application->interest}}" max="100" class="form-control @error('interest') is-invalid @enderror" name="interest" value="{{ old('interest') }}" required autocomplete="interest">
                                @error('interest')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <select class="custom-select form-control" name="itype">
                                    <option value='per Month'>Monthly</option>
                                    <option value='per Year'>Yearly</option>
                                </select>
                                @error('itype')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="origination" class="col-md-4 col-form-label text-md-right">{{ __('Origination Fee ($)') }}<text class="text-danger">*</text></label>
                            <div class="col-md-6">
                                <input id="origination" min="1" type="number" step="0.01" max="9999999" class="form-control @error('origination') is-invalid @enderror" name="origination" value="{{ old('origination', $application->origination_fee) }}" required autocomplete="origination">
                                @error('origination')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cname" class="col-md-4 col-form-label text-md-right">{{ __('Consultant Name') }}</label>
                            <div class="col-md-6">
                                <input id="cname" type="text" class="form-control @error('cname') is-invalid @enderror" name="cname" value="{{ old('cname', $application->consultant_name) }}" autocomplete="cname">
                                @error('cname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ccompany" class="col-md-4 col-form-label text-md-right">{{ __('Consultant Company') }}</label>
                            <div class="col-md-6">
                                <input id="ccompany" type="text" class="form-control @error('ccompany') is-invalid @enderror" name="ccompany" value="{{ old('ccompany', $application->consultant_company) }}" autocomplete="ccompany">
                                @error('ccompany')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ccontact" class="col-md-4 col-form-label text-md-right">{{ __('Consultant Contact') }}</label>
                            <div class="col-md-6">
                                <input id="ccontact" type="text" class="form-control @error('ccontact') is-invalid @enderror" name="ccontact" value="{{ old('ccontact', $application->consultant_contact) }}" autocomplete="ccontact">
                                @error('ccontact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="remark" class="col-md-4 col-form-label text-md-right">{{ __('Remarks') }}</label>
                            <div class="col-md-6">
                                <textarea id="remark" class="form-control @error('remark') is-invalid @enderror" name="remark" cols="40" wrap="soft" value="{{ old('remark') }}" autocomplete="remark" autofocus>{{$application->remark}}</textarea>
                                @error('remark')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ladda-button submit-button m-1" data-style="expand-left"><span class="ladda-label">Update</span></button>

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