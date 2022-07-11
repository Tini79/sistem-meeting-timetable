@extends('layouts.main')
@section('content')
<h1>Aktivitas <span>Tambah</span></h1>
<div class="bg-white p-5">
    <form action="/aktivitas/dataaktivitas" method="post">
        @csrf
        <div class="form-group">
            <div>
                <lable for="activity" class="form-text">Aktivitas</lable>
                <input type="text" name="activity" class="@error('activity') is-invalid @enderror">
                @error('activity')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button>Simpan</button>
        <a href="/aktivitas/dataaktivitas">Batal</a>
    </form>
</div>
@endsection