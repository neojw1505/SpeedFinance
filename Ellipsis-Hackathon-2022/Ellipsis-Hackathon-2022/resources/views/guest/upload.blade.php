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
        <li>{{$application->company->name}}'s Checklists</li>
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
                    <a class="nav-link" id="pills-completed-tab" data-toggle="pill" href='#pills-completed'  role="tab" aria-controls="pills-completed" aria-selected="false">Completed</a>
                </li>
            </ul>
            <div class="tab-content ul-tab__content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-upload" role="tabpanel" aria-labelledby="pills-upload-tab">
                    @if($application->status == 'new')
                        <div class="col-md-6 mx-auto text-center">
                            @foreach($notUploaded as $checklist)
                                <div>
                                    <label id='{{$checklist->id}}' class="pt-4">{{$checklist->checklists->name}}</label>
                                </div>
                                <form action="{{ $url }}" enctype="multipart/form-data" class="dropzone" data-cid="{{$checklist->id}}" method="POST">
                                    @csrf
                                    <div class="fallback">
                                    <input name="file" type="files" multiple/>
                                    </div>
                                </form>
                            @endforeach
                            @foreach($uploaded as $checklist)
                                <label for='{{$checklist->id}}' class="pt-4">{{$checklist->checklists->name}}</label>
                                <i class="i-Yes text-20 mr-2" style="color: #339933"></i>
                                <form action="{{ $url }}" enctype="multipart/form-data" class="dropzone" data-cid="{{$checklist->id}}" method="POST">
                                    @csrf
                                    <div class="fallback">
                                    <input name="file" type="files" multiple/>
                                    </div>
                                </form>
                            @endforeach                       
                        </div>
                    @endif
                    </div>
                    <div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-completed-tab">
                        <div class="col-md-6 mx-auto text-center">
                            @foreach($uploaded as $checklists)
                                <label class="font-weight-bold" for='{{$checklists->checklist_id}}'>{{$checklists->checklists->name}}</label><br>
                                <div class="text-center">
                                @foreach($checklists->files as $file)
                                    <div class="d-flex justify-content-center">
                                        <span class="pr-3">{{$file->name}}</span>
                                        <div>
                                            <a class="btn btn-light btn-rounded " target="_blank" href="{{$file->viewUrl}}"><i class="i-Download-from-Cloud">
                                            </i></a>
                                        </div>
                                        <div>
                                            @if($application->status == 'new')
                                                <form method="POST" action="{{$file->delUrl}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    <button type="submit" class="btn btn-danger btn-rounded del-btn m-1">
                                                                    {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <br><div class="pb-3"></div>
                                    </div>
                                @endforeach
                                </div>
                            @endforeach
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
      timeOut: "6000"})    
    </script>
@endif

<script>   // multiple files

Dropzone.autoDiscover = false;

$('.dropzone').each(function(){
    var id = $(this).attr('data-cid');
    var appId = $('#appId').val();
    $(this).dropzone({
        uploadMultiple:true,
        maxFilesize: 2,
        acceptedFiles: "image/*, .pdf",
        sending: function(file, xhr, formData) {
        formData.append("id", id);
        formData.append("appId", appId);
        }, 
        init : function(){
            this.on("success", function(file, response){
                this.removeFile(file);
                var temp = $(`#${id}`).clone();
                $(`#${id}`).parent().empty().append(temp).append('<i class="i-Yes text-20 mr-2" style="color: #339933"></i>');;
            });
            this.on("queuecomplete", function (file) {
                swal({
                type: 'success',
                title: 'Proccessed!',
                text: 'All Files Processed',
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-lg btn-success'
                }).then(function(){
                     location.reload();
                  }, function(dismiss){
                     location.reload();
                  })
            });
        }


    });

});
</script>

<script> // ajax for completed tab and sweet alert js script for delete btn
    $(document).ready(function(){
        $(document).on('click', '.del-btn' ,function (e) {            
            e.preventDefault();
            var form = $(this).closest('form');
            var successMsg1 =   'Deleted!';
            var successMsg2 =  'File has been Deleted.';
            var cancelMsg =  'File is not Deleted.';
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
            }).then(function (isConfirm) {
               if(isConfirm){
                  form.submit();
               }     
            }, function (dismiss) {
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