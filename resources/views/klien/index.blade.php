@extends('layouts.main')
@section('content')
<h1>Klien <span>Daftar</span></h1>
<div class="d-inline-flex">
    <a href="/klien/dataklien/create">Tambah</a>
</div>
<div class="d-inline-flex float-right">
    <form action="/klien/dataklien">
        <input type="text" name="search">
        <button type="submit">Cari</button>
    </form>
</div>
<div>
    <table class="table">
        <thead>
            <tr>
                <th class="col-1">#</th>
                <th class="col-1">ID</th>
                <th class="col-3">Nama Perusahaan</th>
                <th class="col-3">Alamat</th>
                <th class="col-3">No. Tlp/Handphone</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client => $c)
            <tr>
                <td>{{ $clients->firstItem() + $client }}.</td>
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
    {{ $clients->links() }}
</div>
@endsection