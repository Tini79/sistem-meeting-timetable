<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link href="{{ asset('css/main.calendar.css') }}" rel='stylesheet' />
    <title>{{ $title }}</title>

    <style>

        html, body {
            overflow: hidden; /* don't do scrollbars */
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar-container {
            position: relative;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .fc-header-toolbar {
            /*
            the calendar will be butting up against the edges,
            but let's scoot in the header's buttons
            */
            padding-top: 1em;
            padding-left: 1em;
            padding-right: 1em;
        }

    </style>

</head>
<body>
    <nav class="navbar custom-navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Meeting TimeTable</a>
    </nav>
    <section class="wrapper d-flex align-items-stretch mt-5">
    @include('partials.sidebar')
        <div id="content" class="p-4 p-md-5 pt-5">
            @yield('content')
        </div>
    </section>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/calendar.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/main.calendar.js') }}"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
            height: '100%',
            expandRows: true,
            slotMinTime: '08:00',
            slotMaxTime: '20:00',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            initialView: 'dayGridMonth',
            initialDate: '2020-09-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            selectable: true,
            nowIndicator: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: [
                {
                title: 'All Day Event',
                start: '2020-09-01',
                },
                {
                title: 'Long Event',
                start: '2020-09-07',
                end: '2020-09-10'
                },
                {
                groupId: 999,
                title: 'Repeating Event',
                start: '2020-09-09T16:00:00'
                },
                {
                groupId: 999,
                title: 'Repeating Event',
                start: '2020-09-16T16:00:00'
                },
                {
                title: 'Conference',
                start: '2020-09-11',
                end: '2020-09-13'
                },
                {
                title: 'Meeting',
                start: '2020-09-12T10:30:00',
                end: '2020-09-12T12:30:00'
                },
                {
                title: 'Lunch',
                start: '2020-09-12T12:00:00'
                },
                {
                title: 'Meeting',
                start: '2020-09-12T14:30:00'
                },
                {
                title: 'Happy Hour',
                start: '2020-09-12T17:30:00'
                },
                {
                title: 'Dinner',
                start: '2020-09-12T20:00:00'
                },
                {
                title: 'Birthday Party',
                start: '2020-09-13T07:00:00'
                },
                {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2020-09-28'
                }
            ]
            });

            calendar.render();
        });

    </script>

</body>
</html>