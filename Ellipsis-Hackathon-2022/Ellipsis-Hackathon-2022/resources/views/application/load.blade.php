@extends('layouts.master')

@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Create Application</h1>
    <ul>
        <li><a href="{{route('allApplication')}}">Company</a></li>
        <li>Create Application</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Application Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('createApplication') }}" id="createForm">
                        @csrf

                        @if(isset($company))
                        <input type="hidden" value="{{$company->id}}" name="companyid">
                        @else
                        <div class='form-group row'>
                            <label class="col-md-4 col-form-label text-md-right" for="companySelect">Company</label>
                            <div class="col-md-6">
                                <select class="custom-select form-control" name="companyid" id="companySelect">
                                    @foreach($companies as $company)
                                    <option value={{$company->id}}>{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('companyId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @endif

                        <div class="form-group row">
                            <label for="loant" class="col-md-4 col-form-label text-md-right">{{ __('Loan Tenure (Months)') }}<text class="text-danger">*</text></label>
                            <div class="col-md-6">
                                <input id="loant" type="number" min="1" max="9999999" class="form-control @error('loant') is-invalid @enderror" name="loant" value="{{ old('loant') }}" required autocomplete="loant">
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
                                <input id="loanamt" data-type='currency' type="text" class="form-control @error('loanamt') is-invalid @enderror" name="loanamt" value="{{ old('loanamt') }}" required autocomplete="loanamt">
                                @error('loanamt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ltype" class="col-md-4 col-form-label text-md-right">{{ __('Loan Type') }}<text class="text-danger">*</text></label>
                            <div class="col-md-6">
                                <select class="custom-select form-control" name="ltype">
                                    <option value='Working Capital Loan'>Working Capital Loan</option>
                                    <option value='Hybrid Loan'>Hybrid Loan</option>
                                    <option value='Grant Bridging Loan'>Grant Bridging Loan</option>
                                    <option value='Invoice Financing Loan'>Invoice Financing Loan</option>
                                    <option value='Property Loan'>Property Loan</option>

                                </select>
                                @error('itype')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="interest" class="col-md-4 col-form-label text-md-right">{{ __('Interest Rate (%)') }}<text class="text-danger">*</text></label>
                            <div class="col-md-3">
                                <input id="interest" type="number" step="0.01" min="0.01" max="100" class="form-control @error('interest') is-invalid @enderror" name="interest" value="{{ old('interest') }}" required autocomplete="interest">
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
                                <input id="origination" type="text" data-type="currency" class="form-control @error('origination') is-invalid @enderror" name="origination" value="{{ old('origination') }}" required autocomplete="origination">
                                @error('origination')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @can('manager-priv')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 pb-3">
                                <label class="switch switch-primary mr-3">
                                    <span>Reassign</span>
                                    <input type="checkbox" id='toggle-c' data-toggle="collapse" data-target="#reassign" aria-expanded="false" aria-controls="reassign" name="switch-reassign">
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="collapse" id="reassign">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="companySelect">Reassign</label>
                                <div class="col-md-6">
                                    <select class="custom-select form-control" name="assignedUser" id="assignedUser">
                                        <option value="" selected disabled>Select a RM</option>
                                        @foreach($users as $user)
                                        @if($user->isRm())
                                        <option value={{$user->id}}>{{$user->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                @error('companyId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endcan

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 pb-3">
                                <label class="switch switch-primary mr-3">
                                    <span>Referral</span>
                                    <input type="checkbox" id='toggle-c' data-toggle="collapse" data-target="#referral" aria-expanded="false" aria-controls="referral">
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="collapse" id="referral">
                            <div class="form-group row">
                                <label for="cname" class="col-md-4 col-form-label text-md-right">{{ __('Consultant Name') }}</label>
                                <div class="col-md-6">
                                    <input id="cname" type="text" class="form-control @error('cname') is-invalid @enderror" name="cname" value="{{ old('cname') }}" autocomplete="cname">
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
                                    <input id="ccompany" type="text" class="form-control @error('ccompany') is-invalid @enderror" name="ccompany" value="{{ old('ccompany') }}" autocomplete="ccompany">
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
                                    <input id="ccontact" type="text" class="form-control @error('ccontact') is-invalid @enderror" name="ccontact" value="{{ old('ccontact') }}" autocomplete="ccontact">
                                    @error('ccontact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="remark" class="col-md-4 col-form-label text-md-right">{{ __('Remarks') }}</label>
                            <div class="col-md-6">
                                <textarea id="remark" class="form-control @error('remark') is-invalid @enderror" name="remark" cols="40" wrap="soft" value="{{ old('remark') }}" autocomplete="remark" autofocus></textarea>
                                @error('remark')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ladda-button submit-button m-1" data-style="expand-left"><span class="ladda-label">Next</span></button>

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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('assets/js/vendor/spin.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/ladda.js')}}"></script>

<script>
    const selectElement = document.getElementById('toggle-c');
    selectElement.addEventListener('change', (event) => {

        if (event.target.checked) {
            document.getElementById("assignedUser").required = true;
        } else {
            document.getElementById("assignedUser").required = false;
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#companySelect').select2();
        $('.submit-button').on('click', function(e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            var form = $('#createForm')[0];
            $('#loanamt').val($('#loanamt').val().replace(/[$,]+/g,""));
            $('#origination').val($('#origination').val().replace(/[$,]+/g,""));
            if (form.checkValidity() == true) {
                l.start();
                form.submit();
            } else {
                l.stop();
            }
        });
    });
</script>

<script>
    $("input[data-type='currency']").on({keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
})

function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "$" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "$" + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}
</script>
@endpush

@section('bottom-js')
@endsection