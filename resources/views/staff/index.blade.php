@extends('layouts.main')
@section('content')
<h1>Staff <span>Daftar</span></h1>
<div>
    <a href="/staff/datastaff/create">Tambah</a>
</div>
<div>
    <table class="table">
        <thead>
            <tr>
                <th class="col-1">#</th>
                <th class="col-1
                ">ID</th>
                <th class="col-2">Nama</th>
                <th class="col-2">No. Tlp/Handphone</th>
                <th class="col-2">Aksi</th>
            </tr>
            @foreach($staffs as $staff)
            <tr>
                <td></td>
                <td>{{ $staff->id }}</td>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->phone }}</td>
                <td>
                    <div class="btn-group">
                        <a href="/staff/datastaff/{{ $staff->id }}" class="btn btn-sm"><i class="fa-regular fa-eye text-muted"></i></a>
                        <form action="/staff/datastaff/{{ $staff->id }}" method="post">
                            @csrf
                            <a href="/staff/datastaff/{{ $staff->id }}/edit" class="btn btn-sm"><i class="fa-regular fa-pen-to-square text-info"></i></a>
                            @method('DELETE')
                            <button class="btn btn-sm" onClick="return confirm('Yakin hapus data ?') == true"><i class="fa-solid fa-trash text-danger"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </thead>
    </table>
</div>
@endsection