<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Modals -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Local CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <!-- Time Range Picker -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Datepicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- CSS Datatables stuff-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <title>{{ $title }}</title>
    <style>
        /* Calendar's */
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
        /* Modal's */
        .modal-confirm {		
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;   
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;		
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }		
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }
        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn, .modal-confirm .btn:active {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
        }
        .modal-confirm .btn-secondary {
            background: #c1c1c1;
        }
        .modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
</head>
<body>
    @auth()
    <nav class="navbar custom-navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">Meeting TimeTable</a>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="navbar-btn bg-transparent"><i class="fa-solid fa-right-from-bracket"></i>Logout</button>
            </form>
        </div>
    </nav>
    <section class="wrapper d-flex align-items-stretch mt-5">
        @include('partials.sidebar')
        <div id="content" class="inside-content p-4 p-md-5 pt-5 flex-container w-100">
            @yield('content')
        </div>
        @else
        <div class="content" class="p-4 p-md-5 pt-5">
            @yield('content')
        </div>
        @endauth
    </section>
    <!-- JS Datatable -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap's -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Also, Time Range Picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- Datepicker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Fungsinya untuk membaca script js yg ada di index.blade, supaya dibaca belakangan. Agar script yg ada di atas sini bisa dibaca duluan, baru setelahnya script yg ada di index.blade. -->
    <!-- Boleh juga diterapin untuk CSS jika ada cunstom css di blade tertentu, biar nanti mereka dibaca belakangan -->
    @stack('js')
    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function () {
                    var api = this.api();
        
            // For each column
            api
                .columns([1, 2, 3, 4, 5])
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th.clone').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    $(cell).html('<input type="text" style="width:100%;" class="form-control-sm"/>');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th.clone').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                    });
                },
            });
        });

        $(document).ready(function() {
            $('.select2').select2( {
                theme: 'bootstrap-5'
            });
        })

        config = {
            // dateFormat: "d-m-Y",
            allowInput: true
        }
        flatpickr(".datepicker", config);

        $(document).ready(function(){
            $('.delete-btn').on('click', function() {
                $('#myModal').modal('show');
            })
            $('#closeModal').click(function() {
                $('#myModal').modal('hide')
            })

            // Width dashboard
            $('#sidebarCollapse').on('click', function(){
                $('.inside-content').toggleClass('action');
            });
        })
    </script>
</body>
</html>