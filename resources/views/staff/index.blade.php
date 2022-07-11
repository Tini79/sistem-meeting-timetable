@extends('layouts.main')
@section('content')
<h1>Staff <span>Daftar</span></h1>
<div class="d-inline-flex">
    <a href="/staff/datastaff/create">Tambah</a>
</div>
<div class="d-inline-flex float-right">
    <form action="/staff/datastaff">
        <input type="text" name="search">
        <button type="submit">Cari</button>
    </form>
</div>
<div>
    <table class="table" id="dtBasicExample">
        <thead>
            <tr>
                <th class="col-1">#</th>
                <th class="col-1">ID</th>
                <th class="col-2">Nama</th>
                <th class="col-2">No. Tlp/Handphone</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff => $s)
            <tr>
                <td>{{ $staffs->firstItem() + $staff }}.</td>
                <td>{{ $s->id }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->phone }}</td>
                <td>
                    <div class="btn-group">
                        <a href="/staff/datastaff/{{ $s->id }}" class="btn btn-sm"><i class="fa-regular fa-eye text-muted"></i></a>
                        <a href="/staff/datastaff/{{ $s->id }}/edit" class="btn btn-sm"><i class="fa-regular fa-pen-to-square text-info"></i></a>
                        <form action="/staff/datastaff/{{ $s->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm" onClick="return confirm('Yakin hapus data ?') == true"><i class="fa-solid fa-trash text-danger"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $staffs->links() }}
</div>
@endsection