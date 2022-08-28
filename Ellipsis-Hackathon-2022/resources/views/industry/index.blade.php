@extends('layouts.master')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/toastr.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Industry</h1>
    <ul>
        <li>Industry</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div> 
<div class="pb-4 pl-3">
    <a class="btn btn-primary" href="{{ route('createIndustry') }}" role="button">Create Industry</a><br>
</div>
<div class="col-md-12 mb-4">
   <div class="card text-left">
      <div class="card-body">
         <div class="table-responsive">
            <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
               <thead>
                  <th scope="col">Name</th>
                  <th class="pl-5" scope="col">Action</th>
               </thead>

               <tbody>
                  @foreach($industries as $industry)
                  <tr>
                     <td scope="row">{{$industry->name}} </td>
                     <td>
                           <form method="POST" action="{{ route('deleteIndustry', $industry) }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger submit-btn del-btn">
                                                {{ __('Delete') }}
                              </button>
                           </form>
                     </td>

                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

@push('page-js')
<script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/datatables.script.js')}}"></script>
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/spin.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/ladda.js')}}"></script>
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
      toastr.error("{{session('toast-error')}}", "Error", {
            timeOut: "5000",
      });    
   </script>
@endif

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

    $('.del-btn').on('click', function (e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var cancelMsg =  'Industry is not Deleted.';
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

@section('bottom-js')
@endsection