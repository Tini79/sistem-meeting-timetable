@extends('layouts.main')

@section('content')
<!-- Modal -->
<div class="modal fade" id="calendarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <div class="bg-white p-5">
        <div class="mb-3 mr-1 row justify-content-end">
            <form action="/dashboard">
                <div class="input-group-sm">
                    <input type="text" name="dateFilter" value="" class="form-control-sm"/>
                </div>
            </form>
        </div>
        <div id='loading'>loading...</div>

        <div id='calendar'></div>

    </div>

    <!-- Calendar stuff -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <!-- Fullcalendar -->
    <script>
        $(document).ready(function() {

            var assignment = @json($assignments);
            console.log(assignment)
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek'
                },
                events: assignment,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays) {
                    $('#calendarModal').modal('toggle');
                }
            })
        });
    </script>

@endsection