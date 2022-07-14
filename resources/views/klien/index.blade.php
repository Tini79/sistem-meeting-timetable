@extends('layouts.main')
@section('content')
<div class="">
    <h1>Klien <sup class="text-secondary">Daftar</sup></h1>
</div>
<div class="row justify-content-end mr-1">
    <a href="/klien/dataklien/create" class="btn btn-outline-primary">Tambah</a>
</div>
<div class="mt-3 bg-white p-5">
    <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
        <thead class="bg-secondary">
            <tr>
                <th class="col-1 text-white">#</th>
                <th class="col-1 text-white">ID</th>
                <th class="col-3 text-white">Nama Perusahaan</th>
                <th class="col-3 text-white">Alamat</th>
                <th class="col-3 text-white">No. Tlp/Handphone</th>
                <th class="col-2 text-white">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client => $c)
            <tr>
                <td>{{ $client + 1 }}.</td>
                <td>{{ $c->id }}</td>
                <td>{{ $c->company_name }}</td>
                <td>{{ $c->addr }}</td>
                <td>{{ $c->phone }}</td>
                <td>
                    <div class="btn-group">
                        <a href="/klien/dataklien/{{ $c->id }}" class="btn btn-sm"><i class="fa-regular fa-eye text-muted"></i></a>
                        <a href="/klien/dataklien/{{ $c->id }}/edit" class="btn btn-sm"><i class="fa-regular fa-pen-to-square text-info"></i></a>
                        <form action="/klien/dataklien/{{ $c->id }}" method="post">
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
@endsection