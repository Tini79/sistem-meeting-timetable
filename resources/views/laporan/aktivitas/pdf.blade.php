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
            <h1>Laporan Data Aktivitas</h1>
        </div>
        <table class="table" border="1">
            <thead class="bg-primary">
                <tr>
                    <th class="text-white">#</th>
                    <th class="col text-white">Aktivitas</th>
                    <th class="col-4 text-white">Handler</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity => $a)
                <tr>
                    <td>{{ $activity + 1 }}.</td>
                    <td>{{ $a->activity }}</td>
                    <td>
                        @foreach($a->assignments as $assignment)
                        @if($a->id == $assignment->activity_id)
                        @if($staff != $assignment->staff->name)
                        <div>{{ $staff = $assignment->staff->name }}</div>
                        @endif
                        @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>