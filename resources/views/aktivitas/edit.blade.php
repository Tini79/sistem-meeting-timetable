@extends('layouts.main')
@section('content')
<h1>Aktivitas <span>Ubah</span></h1>
<div class="bg-white p-5">
    <form action="/aktivitas/dataaktivitas/{{ $activity->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <div>
                <lable class="form-text">Aktivitas</lable>
                <input type="text" name="activity" value="{{ old('activity', $activity->activity) }}">
            </div>
        </div>
        <button>Simpan</button>
        <a href="/aktivitas/dataaktivitas">Kembali</a>
    </form>
</div>
@endsection