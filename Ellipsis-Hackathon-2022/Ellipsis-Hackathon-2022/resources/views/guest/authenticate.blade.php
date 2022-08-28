@extends('layouts.master')

@section('main-content')
<div class="container">
    @if (session('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('AUTHENTICATION') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ $url }}">
                        @csrf

                        <div class="form-group row">
                            <label for="uen" class="col-md-4 col-form-label text-md-right">{{ __('UEN NUMBER') }}</label>

                            <div class="col-md-6">
                                <input id="uen" type="text" class="form-control @error('uen') is-invalid @enderror" name="uen" value="{{ old('uen') }}" required autocomplete="uen" autofocus>

                                @error('uen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Authenticate') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
