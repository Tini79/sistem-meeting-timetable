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
    <!-- Css of Calendar stuff -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <!-- Time Range Picker -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- CSS Datatables stuff-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <title>{{ $title }}</title>
    <style>

        body {
        padding: 0;
        }

        #loading {
        display: none;
        position: absolute;
        top: 10px;
        right: 10px;
        }

        #calendar {
        max-width: 1100px;
        margin: 0 auto;
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
    <!-- Time Range Picker Stuff -->

    <!-- Bootstrap's -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- JS Datatable -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    
    <!-- Calendar stuff | ada di index dashboard juga -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <!-- Also, Time Range Picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <!-- Moment stuff -->
    <script src="{{ asset('js/moment.js') }}"></script>

    <script>
        $(function() {
            $('input[name="dateFilter"]').daterangepicker({
                opens: 'left',
                autoUpdateInput: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="dateFilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });

            $('input[name="dateFilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#example').DataTable();
        });
    </script>

</body>
</html>