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
            <h1>Laporan Data Kinerja Staff</h1>
        </div>
        <table class="table" border="1">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white">#</th>
                    <th class="text-white">Nama</th>
                    <th class="text-white">Tanggal Mulai</th>
                    <th class="text-white">Tanggal Selesai</th>
                    <th class="text-white">Klien</th>
                    <th class="text-white">Total Assignment</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $staff => $s)
                <tr>
                    <td>{{ $staff + 1 }}.</td>
                    <td>{{ $s->name }}</td>
                    <td>
                        @foreach($s->assignments as $assignment)
                        <div>{{ $assignment->start_date->format('d-m-Y') }}</div>
                        </br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($s->assignments as $assignment)
                        <div>{{ $assignment->end_date->format('d-m-Y') }}</div>
                        </br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($s->assignments as $assignment)
                        <div>{{ $assignment->client->company_name }}</div>
                        </br>
                        @endforeach
                    </td>
                    <td class="text-center">{{ count($s->assignments) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>