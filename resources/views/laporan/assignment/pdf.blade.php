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
        <table class="table" border="1">
            <thead class="bg-primary">
                <tr>
                <th class="text-white">#</th>
                    <th class="text-white">Staff</th>
                    <th class="text-white">Klien</th>
                    <th class="text-white">Aktivitas</th>
                    <th class="text-white">Tanggal Mulai</th>
                    <th class="text-white">Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignments as $assignment => $a)
                <tr>
                    <td>{{ $assignment + 1 }}.</td>
                    <td class="text-center text-uppercase">{{ $a->staff->name }}</td>
                    <td>{{ $a->client->company_name }}</td>
                    <td>{{ $a->activity->activity }}</td>
                    <td>{{ showDateTime($a->start_date, 'd-m-Y') }}</td>
                    <td>{{ showDateTime($a->end_date, 'd-m-Y') }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-right">Jumlah Assignment</td>
                    <td colspan="2">{{ $assignments->count() }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>