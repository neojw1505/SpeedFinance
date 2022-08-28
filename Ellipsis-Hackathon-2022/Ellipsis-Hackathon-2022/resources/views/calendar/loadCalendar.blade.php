@extends('layouts.master')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/toastr.css') }}">
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css' rel='stylesheet' />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css" integrity="sha256-ejA/z0dc7D+StbJL/0HAnRG/Xae3yS2gzg0OAnIURC4=" crossorigin="anonymous">
<style>
  html,
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 16px;
  }

  #calendar {
    max-width: 1100px;
    margin: 40px 40px;
  }

  label#editModalTitleLabel {
    font-weight: bold;
  }

  label#editModalDateLabel {
    font-weight: bold;
  }
  
  label#editModalTimeLabel {
    font-weight: bold;
  }
  
  label#editModalDescLabel {
    font-weight: bold;
  }

  p#rmdTitle {
    font-size: 24px;
    font-weight: bold;
  }
  .modal-header{
    margin-bottom:0px;
    margin-top:0px;
    padding-bottom:0px;
    padding-top:0px;

    background-color: lightgrey;
  }
  label#rmdDescLabel {
    font-weight: bold;
  }

  #rmdModal .modal-body p#rmdDesc {
    font-size: 14px;
    font-style: italic;
  }

  label#rmdDateLabel {
    font-weight: bold;
  }

  label#rmdTimeLabel {
    font-weight: bold;
  }

  #rmdModal .modal-body p#rmdDate {
    font-size: 14px;
  }

  #rmdModal .modal-body p#rmdTime {
    font-size: 14px;
  }

  #modal-close {
    color: red;
  }

  #editCalRmd {
    bottom: 0px;
    float: right;
    padding-right: 5px;
  }

  #delCalRmd {
    bottom: 0px;
    float: right;
    padding-right: 5px;
  }

  #editModalDesc {
    height: 150px;
  }

  #saveCalRmd {
    float: right;
  }

  #date {
    width: auto;
  }

  #time {
    width: auto;
  }

</style>
@endsection

@section('main-content')
<html lang='en'>
<head><meta charset='utf-8'/></head>
  <body>
    <div id='calendar'></div>  
    <!-- Reminder Modal Pop-up -->
    <div class="modal fade" id="rmdModal" tabindex="-1" role="dialog" aria-labelledby="rmdModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" id="modal-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="rmdTitle"></p>
            <label for="rmdDateLabel" id="rmdDateLabel">Date:</label>
            <p id="rmdDate"></p>
            <label for="rmdTimeLabel" id="rmdTimeLabel">Time:</label>
            <p id="rmdTime"></p>
            <label for="rmdDesc" id="rmdDescLabel">Description:</label>
            <p id="rmdDesc"></p>
            <a href=""><i class="fas fa-trash-alt" id='delCalRmd' dataid="" data-toggle="tooltip" data-placement="bottom" title="Click to Delete Reminder!"></i></a>
            <a href=""><i class="far fa-edit" id="editCalRmd" data-toggle="tooltip" data-placement="bottom" title="Click to Edit Reminder!"></i></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Modal Pop-up -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" id="modal-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{route('updateCalendarReminder')}}" id=editModalForm>
              @csrf
              @method('PUT')
              <div class="form-group">
                <input type="hidden" name="id" id="hidden-id" value="">
                <label for="editModalTitleLabel" id="editModalTitleLabel" class="col-form-label">Title</label><span style="color:red">*</span>
                <input type="text" class="form-control" name='editModalTitle' value="" id="editModalTitle" required>
              </div>
              <div class="form-group">
                <label for="date" id="editModalDateLabel" class="col-form-label">Date</label><span style="color:red">*</span>
                  <div class="input-group date" data-provide="datepicker">
                    <div class='input-group date'>
                      <input type='text' class="form-control" name="date" id='date' required/>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                </div>
                <div class="form-group">
                  <label for="time" id="editModalTimeLabel" class="col-form-label">Time</label><span style="color:red">*</span>
                    <div class="input-group date" data-provide="datepicker">
                      <div class='input-group date'>
                        <input type='text' class="form-control" name="time" id='time' required/>
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="editModalDescLabel" id="editModalDescLabel" class="col-form-label">Description:</label>
                  <textarea class="form-control" name='editModalDesc' id="editModalDesc"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="saveCalRmd" dataid="">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

@push('page-js')
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/vendor/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/toastr.min.js') }}"></script>
@endpush

@endsection

@section('bottom-js')
@if (session('toast-success'))
  <script>
    toastr.success("{{ session('toast-success') }}", "Success", {
      timeOut: "5000",
    });
  </script>
@endif
@if (session('toast-error'))
  <script>
    toastr.error("{{ session('toast-error') }}", "Error", {
      timeOut: "5000",
    });
  </script>
@endif
<script>
  var holiday = @json($holiday);
  var reminder = @json($reminder);

  var calendar;
  function getCalendar() {

    // Get Holidays ID
    let holiday_id = [];
    holiday.forEach(h => {
      holiday_id.push(h.id);
    })

    var calendarEl = document.getElementById('calendar');
    calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      eventSources: [
        holiday,
        reminder,
      ],
      dayMaxEventRows: true,
      initialView: 'dayGridMonth',

      eventDrop: function(e) {
        let eventData = {
          id: e.event.id,
          start: moment(e.event.start).format('YYYY-MM-DD HH:mm')
        }
        getSelectedEvent(eventData)
      },

      eventClick: function(e) {
        $("#rmdModal").appendTo('body').modal("show");
        $("p#rmdTitle").text(e.event.title);
        $("#rmdModal .modal-body p#rmdDate").text(moment(e.event.start).format("YYYY-MM-DD"));
        $("#rmdModal .modal-body p#rmdTime").text(moment(e.event.start).format("h:mm A"));
        $("#rmdModal .modal-body p#rmdDesc").html(e.event.extendedProps.description);
        $('#saveCalRmd').attr('dataid', e.event.id);
        $('#delCalRmd').attr('dataid', e.event.id);
        $('#editCalRmd').attr('dataid', e.event.id);

        // Hide Edit and Delete Icon if Holiday
        if(holiday_id.includes(parseInt(e.event.id))){
          $('#delCalRmd').hide();
          $('#editCalRmd').hide();
        } else {
          $('#delCalRmd').show();
          $('#editCalRmd').show();
        }
      },
    });
    calendar.render();
  }
  // Create Calendar
  getCalendar();

  function getSelectedEvent(eventData) {
    console.log(eventData);
    fetch('/calendar/update-calendar', {
      method: 'POST',
      headers: {
        'Content-type': 'application/json',
        'X-CSRF-TOKEN': "{{csrf_token()}}"
      },
      body: JSON.stringify(eventData)
    }).then((res) => {
      return res.json();
    }).then((val) => {
      console.log(val);
    })
  }

  //delete calendar reminder
  $('#delCalRmd').on('click', (e) => {
 
    e.preventDefault();
    if(confirm('Are you sure?'))
    return
    let id = e.target.getAttribute("dataid");
    const deleteMethod = {
      method: 'DELETE',
      headers: {
        'Content-type': 'application/json; charset=UTF-8',
        'X-CSRF-TOKEN': "{{csrf_token()}}"
      },
    }
    fetch('/calendar/delete-reminder/' + id, deleteMethod) //delete from DB
      .then(response => response.json())
      .then(id => {
        let event = calendar.getEventById(id);
        event.remove(); //delete from frontend
        $('#rmdModal').modal('hide');
      })
      .catch(err => console.log(err))
  })

  //edit Calendar Reminder
  $('#editCalRmd').on('click', (e) => {
    e.preventDefault();
    $("#editModal").on("shown.bs.modal", function() {
      $('#rmdModal').modal('hide');

      // Populate Edit Modal Input Fields
      $('#editModalTitle').val($("#rmdTitle").text());
      $('#date').val($("#rmdDate").text());
      $('#time').val($("#rmdTime").text());
      $('#editModalDesc').val($("#rmdDesc").html());
    });

    let id = e.target.getAttribute("dataid");
    let val = $('#hidden-id').val(id);
    $('#editModal').appendTo('body').modal('show');
  })

  // Date Picker
  $('#date').datetimepicker({
    minDate: moment(new Date().toDateString()),
    format: 'YYYY-MM-DD',
    defaultDate: moment(new Date().toDateString()),
    icons: {
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right',
    },
  });

  // Time Picker
  $('#time').datetimepicker({
    format: 'hh:mm A',
    minDate: moment(),
    icons: {
      up: 'fas fa-arrow-up',
      down: 'fas fa-arrow-down',
      useCurrent: false
    },
  });

  // Reset Time Constraints On a New Day
  $('#date').on("dp.change", function(e) {
    $('#time').data("DateTimePicker").minDate(moment(new Date()));
      if (moment(e.target.value).isAfter()) {
        $('#time').data("DateTimePicker").minDate(moment(new Date().toDateString()));
      }
    });

</script>
@endsection
