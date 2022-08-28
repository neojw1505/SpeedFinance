@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/toastr.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/dropzone.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">

@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Checklist</h1>
    <ul>
        <li><a href="{{route('viewCompany')}}">Company</a></li>
        <li><a href="{{route('showCompany', $application->company)}}">{{$application->application_id}}</a></li>
        <li>Checklist</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="col-md-12 mb-4">
    <div class="card text-left">
        <div class="card-body">
            <input type="hidden" id="appId" value={{$application->id}}>
            <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-upload-tab" data-toggle="pill" href="#pills-upload" role="tab" aria-controls="pills-upload" aria-selected="true">Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-completed-tab" data-toggle="pill" href='#pills-completed' role="tab" aria-controls="pills-completed" aria-selected="false">Completed</a>
                </li>
            </ul>
            <div class="tab-content ul-tab__content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-upload" role="tabpanel" aria-labelledby="pills-upload-tab">
                    @if($application->status == 'new')
                    <div class="col-md-6 mx-auto text-center">
                        @foreach($notUploaded as $checklist)
                        <div>
                            <label id="{{$checklist->id}}" class="pt-4 pr-1">{{$checklist->checklists->name}}</label>
                        </div>
                        <form action="{{ route('storeChecklist') }}" enctype="multipart/form-data" class="dropzone" data-cid="{{$checklist->id}}" method="POST">
                            @csrf
                            <div class="fallback">
                                <input name="file" type="files" multiple />
                            </div>
                        </form>
                        @endforeach
                        @foreach($uploaded as $checklist)
                        <label for='{{$checklist->id}}' class="pt-4">{{$checklist->checklists->name}}</label>
                        <i class="i-Yes text-20 mr-2" style="color: #339933"></i>
                        <form action="{{ route('storeChecklist') }}" enctype="multipart/form-data" class="dropzone" data-cid="{{$checklist->id}}" method="POST">
                            @csrf
                            <div class="fallback">
                                <input name="file" type="files" multiple />
                            </div>
                        </form>
                        @endforeach
                        @can('manager-rm')
                        @if($application->status == 'new')
                        <div class="pt-5"></div>
                        <a class="btn btn-outline-info" id="generate-btn" role="button">Generate URL</a>
                        @endif
                        @endcan
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-completed-tab">
                    <div class="col-md-6 mx-auto text-center">
                        <div id="listOfCompleted"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-js')
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/toastr.min.js')}}"></script>

@if(session('toast-success'))
<script>
    toastr.success("{{session('toast-success')}}", "Success", {
        timeOut: "5000",
    });
</script>
@endif
@if(session('toast-error'))
<script>
    toastr.error("{{session('toast-error')}}", "Warning", {
        timeOut: "6000"
    })
</script>
@endif

<script>
    // dropzone js script
    Dropzone.autoDiscover = false;

    $('.dropzone').each(function() {
        var id = $(this).attr('data-cid');
        var appId = $('#appId').val();
        $(this).dropzone({
            uploadMultiple: true,
            maxFilesize: 2,
            acceptedFiles: "image/*, .pdf",
            sending: function(file, xhr, formData) {
                formData.append("id", id);
                formData.append("appId", appId);
            },
            init: function() {
                this.on("success", function(file, response) {
                    this.removeFile(file);
                    var temp = $(`#${id}`).clone();
                    $(`#${id}`).parent().empty().append(temp).append('<i class="i-Yes text-20 mr-2" style="color: #339933"></i>');;
                });
                this.on("queuecomplete", function(file) {
                    swal({
                        type: 'success',
                        title: 'Success!',
                        text: 'All Files Processed',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-lg btn-success'
                    })
                });
            }


        });

    });
</script>
<script>
    // ajax for completed tab and sweet alert js script for delete btn
    $(document).ready(function() {
        $('#pills-completed-tab').click(function(e) {
            $('#listOfCompleted').html('<div class="loader spinner-glow spinner-glow-primary">');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('completed') }}",
                data: {
                    appId: "{{$application->id}}"
                },
                success: function(data) {
                    $('#listOfCompleted').html(data);
                },
                error: function() {
                    $('#listOfCompleted').html('<div class="alert alert-danger text-center">INTERNAL SERVER ERROR</div>');
                }
            });
        });



        $('#generate-btn').click(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{route('generateClURL', $application)}}",
                success: function(data) {
                    swal({
                        type: 'info',
                        title: 'Url For Guest File Upload!',
                        html: '<div class="text-break">' + data + '</div>',
                        buttonsStyling: false,
                        confirmButtonText: 'Copy and Close',
                        confirmButtonClass: 'btn btn-lg btn-info',
                        allowOutsideClick: false
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            let copyFrom = document.createElement("textarea");
                            document.body.appendChild(copyFrom);
                            copyFrom.textContent = data;
                            copyFrom.select();
                            document.execCommand("copy");
                            copyFrom.remove();
                            toastr.success("Copied to Clipboard", "Success", {
                                timeOut: "5000",
                            });

                        }
                    })
                },
                error: function() {
                    $('#listOfCompleted').html('<div class="alert alert-danger text-center">INTERNAL SERVER ERROR</div>');
                }
            });
        });

        $(document).on('click', '.del-btn', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var successMsg1 = 'Deleted!';
            var successMsg2 = 'File has been Deleted.';
            var cancelMsg = 'File is not Deleted.';
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
                    form.submit();
                }
            }, function(dismiss) {
                // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                if (dismiss === 'cancel' || dismiss === 'overlay') {
                    swal(
                        'Cancelled',
                        cancelMsg,
                        'error'
                    ).catch(swal.noop)
                }
            })
        });

    });
</script>

@endpush

@section('bottom-js')
@endsection