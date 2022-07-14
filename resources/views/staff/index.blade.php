@extends('layouts.main')
@section('content')
<div class="">
    <h1>Staff <sup class="text-secondary">Daftar</sup></h1>
</div>
<div class="row justify-content-end mr-1">
    <a href="/staff/datastaff/create" class="btn btn-outline-primary">Tambah</a>
</div>
<div class="mt-3 bg-white p-5">
    <div>
        <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
            <thead class="bg-secondary">
                <tr>
                    <th class="col-1 text-white">#</th>
                    <th class="col-1 text-white">ID</th>
                    <th class="col-2 text-white">Nama</th>
                    <th class="col-2 text-white">No. Tlp/Handphone</th>
                    <th class="col-2 text-white">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $staff => $s)
                <tr>
                    <td>{{ $staff + 1 }}.</td>
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
    </div>
</div>
@endsection