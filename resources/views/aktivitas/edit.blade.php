@extends('layouts.main')
@section('content')
<h1>Aktivitas <sup class="text-secondary">Ubah</sup></h1>
<div class="bg-white p-5">
    <form action="/aktivitas/dataaktivitas/{{ $activity->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <lable class="form-text">Aktivitas</lable>
            <input type="text" name="activity" value="{{ old('activity', $activity->activity) }}" class="form-control">
        </div>
        <button onClick="return confirm('Yakin menyimpan data ?') == true" class="btn btn-primary">Simpan</button>
        <a href="/aktivitas/dataaktivitas" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection