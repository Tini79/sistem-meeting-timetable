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
            <h1>Laporan Data Klien</h1>
        </div>
        <table class="table" border="1">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white">#</th>
                    <th class="text-white">Nama Perusahaan</th>
                    <th class="text-white">Alamat</th>
                    <th class="text-white">No. Tlp/Handphone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client => $c)
                <tr>
                    <td>{{ $client + 1 }}.</td>
                    <td>{{ $c->company_name }}</td>
                    <td>{{ $c->addr }}</td>
                    <td>{{ $c->phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>