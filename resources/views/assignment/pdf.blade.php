<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>Document</title>
</head>

<body>
    <div class="bg-transparent">
        <div class="text-center">
            <h1>Laporan Data Assignment</h1>
        </div>
        <div class="mt-3 bg-white p-5">
            <h1>{{ $assignment->client->company_name }}</h1>
            <hr>
            <table>
                <tr>
                    <td class="col-4">Klien</td>
                    <td class="col-2">:</td>
                    <td>{{ $assignment->client->company_name }}</td>
                </tr>
                <tr>
                    <td class="col-4">Staff</td>
                    <td class="col-2">:</td>
                    <td>{{ $assignment->staff->name }}</td>
                </tr>
                <tr>
                    <td class="col-4">Aktivitas</td>
                    <td class="col-2">:</td>
                    <td>{{ $assignment->activity->activity }}</td>
                </tr>
                <tr>
                    <td class="col-4">Tanggal Mulai</td>
                    <td class="col-2">:</td>
                    <td>{{ date('d-m-Y', strtotime($assignment->start_date)) }}</td>
                </tr>
                <tr>
                    <td class="col-4">Tanggal Selesai</td>
                    <td class="col-2">:</td>
                    <td>{{ date('d-m-Y', strtotime($assignment->end_date)) }}</td>
                </tr>
                <tr>
                    <td class="col-4">Note</td>
                    <td class="col-2">:</td>
                    <td>{{ $assignment->note === NULL ? '-' : $assignment->note; }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>