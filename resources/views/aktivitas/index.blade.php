@extends('layouts.main')
@section('content')
<h1>Aktivitas <span>Daftar</span></h1>
<div class="d-inline-flex">
    <a href="/aktivitas/dataaktivitas/create">Tambah</a>
</div>
<div class="d-inline-flex float-right">
    <form action="/aktivitas/dataaktivitas">
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
                <th class="col-4">Aktivitas</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity => $a)
            <tr>
                <td>{{ $activities->firstItem() + $activity }}.</td>
                <td>{{ $a->id }}</td>
                <td>{{ $a->activity }}</td>
                <td>
                    <div class="btn-group">
                        <a href="/aktivitas/dataaktivitas/{{ $a->id }}" class="btn btn-sm"><i class="fa-regular fa-eye text-muted"></i></a>
                        <a href="/aktivitas/dataaktivitas/{{ $a->id }}/edit" class="btn btn-sm"><i class="fa-regular fa-pen-to-square text-info"></i></a>
                        <form action="/aktivitas/dataaktivitas/{{ $a->id }}" method="post">
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
    {{ $activities->links() }}
</div>
@endsection