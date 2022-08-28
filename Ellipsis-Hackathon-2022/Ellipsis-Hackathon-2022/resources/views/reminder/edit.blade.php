@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
@endsection

@section('main-content')
<h3>Edit Reminder</h3>
<div class="breadcrumb">
    <ul>
        <li><a href="{{route('viewCompany')}}">Company</a></li>
        <li><a href="{{route('showCompany', $reminder->application->company)}}">{{$reminder->application->company->name}}</a></li>
        <li><a href="{{route('showApplication', $reminder->application)}}">Show Application</a></li>
        <li>Edit Reminder</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Contact Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateReminder', $reminder) }}" id="editForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="detail" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}<text class="text-danger">*</text></label>

                            <div class="col-md-6">
                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Reminder Title" required autocomplete="title" value="{{$reminder->title}}" autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}<text class="text-danger">*</text></label>

                            <div class="col-md-6" id="datetimepicker1">
                                <input id="date" type="text" class="datetimepicker datetimepicker.startDate form-control @error('dateTime') is-invalid @enderror" name="date" value="{{ old('dateTime') }}" required autocomplete="dateTime">

                                @error('dateTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}<text class="text-danger">*</text></label>

                            <div class="col-md-6" id="datetimepicker2">
                                <input id="time" type="text" class="datetimepicker datetimepicker.startDate form-control @error('dateTime') is-invalid @enderror" name="time" value="{{ old('dateTime') }}" placeholder="Reminder Timing" required autocomplete="dateTime">

                                @error('dateTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detail" class="col-md-4 col-form-label text-md-right">{{ __('Details') }}</label>

                            <div class="col-md-6">
                                <textarea id="detail" class="form-control @error('detail') is-invalid @enderror" name="detail" cols="40" required autocomplete="detail" autofocus>{{$reminder->detail}}</textarea>


                                @error('detail')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function() {
        $('#date').datetimepicker({
                minDate: moment(new Date().toDateString()),
                format: 'YYYY-MM-DD',
                defaultDate: moment(new Date().toDateString())
            }),
            $('#time').datetimepicker({
                format: 'hh:mm A',
                minDate: moment()
            })
    });
</script>
<script>
    $(document).ready(function() {
        $('.submit-button').on('click', function(e) {
            var laddaBtn = e.currentTarget;
            var l = Ladda.create(laddaBtn);
            var form = $('#editForm')[0];
            console.log(moment(form.time.value, ["hh:mm A"]).format("HH:mm"));
            var convertedTime = moment(form.time.value, ["hh:mm A"]).format("HH:mm");
            $('#time').val(convertedTime);
            if (form.checkValidity() == true) {
                l.start();
                form.submit();
            } else {
                l.stop();
            }
        });
        $("#date").on("dp.change", function(e) {
            $('#time').data("DateTimePicker").minDate(moment(new Date().toDateString()));
            if (moment(e.target.value).isAfter()) {
                $('#time').data("DateTimePicker").minDate(moment(new Date().toDateString()));
            }
        });
    });
</script>
@endpush

@section('bottom-js')
@endsection