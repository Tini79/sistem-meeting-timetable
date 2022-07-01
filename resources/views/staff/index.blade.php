@extends('layouts.main')
@section('content')
<body>
    <h1>Staff <span>Daftar</span></h1>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th class="col-2
                    ">ID</th>
                    <th class="col-2">Nama</th>
                    <th class="col-2">No. Tlp/Handphone</th>
                    <th class="col-2">Jabatan</th>
                </tr>
                @foreach($staffs as $staff)
                <tr>
                    <td></td>
                    <td>{{ $staff->id }}</td>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>{{ $staff->level }}</td>
                </tr>
                @endforeach
            </thead>
        </table>
    </div>
</body>
@endsection