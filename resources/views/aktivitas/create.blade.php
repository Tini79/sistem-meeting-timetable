@extends('layouts.main')
@section('content')
<h1>Aktivitas <sup class="text-secondary">Tambah</sup></h1>
<div class="bg-white p-5 w-100">
    <form action="/aktivitas/dataaktivitas" method="post">
        @csrf
        <div class="form-group">
            <lable for="activity" class="form-text">Aktivitas</lable>
            <input type="text" name="activity" value="{{ old('activity') }}" class="form-control @error('activity') is-invalid @enderror">
            @error('activity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="/aktivitas/dataaktivitas" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection