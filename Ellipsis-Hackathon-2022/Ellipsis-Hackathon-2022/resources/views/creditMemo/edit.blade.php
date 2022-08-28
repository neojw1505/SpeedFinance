@extends('layouts.master')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/vendor/sweetalert2.min.css') }}">
@endsection

@section('main-content')
    <div class="breadcrumb">
        <h1>Credit Memo</h1>
        <ul>
            @canany(['manager-priv'])
            <li><a href="{{ route('viewCompany') }}">Company</a></li>
            <li><a href="{{ route('showCompany', $application->company) }}">{{ $application->company->name }}</a></li>
            <li><a href="{{ route('showApplication', $application) }}">Show Application</a></li>
        @endcan
        <li>Credit Memo</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <form method="POST" action="{{ route('exportCreditMemo', $application) }}" target="_blank">
                @csrf
                <button type="button" class="btn btn-primary mb-4 mr-1" id="saveFormBtn">
                    {{ __('Save Credit Memo') }}
                </button>
                <button type="submit" class="btn btn-success mb-4 mr-1">
                    {{ __('Export') }}
                </button>
                <button type="button" class="btn btn-danger mb-4" id="resetBtn">
                    {{ __('Reset') }}
                </button>

                <div class="card">
                    <div class="card-header">{{ __('Credit Memo') }}</div>
                    <div class="card-body">
                        <textarea id="creditMemoEditor" name="memo">
                            {!! $html !!}
                        </textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('page-js')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script src="{{ asset('assets/js/vendor/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/toastr.min.js') }}"></script>
@if (session('toast-success'))
    <script>
        toastr.success("{{ session('toast-success') }}", "Success", {
            timeOut: "5000",
        });

    </script>
@endif
@if (session('toast-error'))
    <script>
        toastr.error("{{ session('toast-error') }}", "Warning", {
            timeOut: "6000"
        })

    </script>
@endif
<script>
    $(document).ready(function() {
        CKEDITOR.replace('creditMemoEditor', {
            height: 500,
            allowedContent: true,
            removeFormatAttributes: '',
        });

        $('#resetBtn').on('click', function(e) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0CC27E',
                cancelButtonColor: '#FF586B',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonClass: 'btn btn-success mr-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(isConfirm) {
                if (isConfirm) {
                    // window.location = "{{ route('resetCreditMemo', $application) }}"
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('resetCreditMemo', $application) }}",
                        success: function(response) {
                            CKEDITOR.instances.creditMemoEditor.setData(
                                response.data);
                            swal({
                                type: 'success',
                                title: 'Reset success',
                                text: 'Credit memo has successfully reset.',
                                buttonsStyling: false,
                                confirmButtonText: 'Close',
                                confirmButtonClass: 'btn btn-lg btn-info',
                                allowOutsideClick: false
                            })
                        },
                        error: function() {

                        }
                    });
                }
            })
        })

        $('#saveFormBtn').on('click', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('saveCreditMemo', $application) }}",
                data: {
                    memo: CKEDITOR.instances.creditMemoEditor.getData()
                },
                success: function(data) {
                    swal({
                        type: 'success',
                        title: 'Save success',
                        text: 'Credit memo is successfully saved.',
                        buttonsStyling: false,
                        confirmButtonText: 'Close',
                        confirmButtonClass: 'btn btn-lg btn-info',
                        allowOutsideClick: false
                    })
                },
                error: function() {

                }
            });
        })

    });

</script>
@endpush

@section('bottom-js')
@endsection
