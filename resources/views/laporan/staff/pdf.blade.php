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
            <h1>Laporan Data Staff</h1>
        </div>
        <table class="table" border="1">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white">#</th>
                    <th class="text-white">Kode</th>
                    <th class="text-white">Nama</th>
                    <th class="text-white">No. Tlp/Handphone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $staff => $s)
                <tr>
                    <td>{{ $staff + 1 }}.</td>
                    <td class="text-center text-uppercase">{{ $s->letter_code }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->phone }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-right">Jumlah Staff</td>
                    <td>{{ $staffs->count() }} orang</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>