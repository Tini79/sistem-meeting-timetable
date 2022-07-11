@extends('layouts.main')
@section('content')
<h1>Assignment <span>Daftar</span></h1>
<div class="d-inline-flex">
    <a href="/assignment/dataassignment/create">Tambah</a>
</div>
<div class="d-inline-flex float-right">
    <form action="/assignment/dataassignment">
        <input type="text" name="search">
        <button type="submit">Cari</button>
    </form>
</div>
<div>
    <table class="table">
        <thead>
            <tr>
                <th class="col-1">#</th>
                <th class="col-3">Staff</th>
                <th class="col-3">Klien</th>
                <th class="col-2">Aktivitas</th>
                <th class="col-2">Tanggal Mulai</th>
                <th class="col-2">Tanggal Selesai</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assignment => $a)
            <tr>
                <td>{{ $assignments->firstItem() + $assignment }}.</td>
                <td>{{ $a->staff->name }}</td>
                <td>{{ $a->client->company_name }}</td>
                <td>{{ $a->activity->activity }}</td>
                <td>{{ showDateTime($a->startDate, 'd-m-Y') }}</td>
                <td>{{ showDateTime($a->endDate, 'd-m-Y') }}</td>
                <td>
                    <div class="btn-group">
                        <a href="/assignment/dataassignment/{{ $a->id }}" class="btn btn-sm"><i class="fa-regular fa-eye text-muted"></i></a>
                        <a href="/assignment/dataassignment/{{ $a->id }}/edit" class="btn btn-sm"><i class="fa-regular fa-pen-to-square text-info"></i></a>
                        <form action="/assignment/dataassignment/{{ $a->id }}" method="post">
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
    {{ $assignments->links() }}
</div>
@endsection