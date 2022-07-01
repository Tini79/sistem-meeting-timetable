@extends('layouts.main')
@section('content')
<h1>Staff <span>Ubah</span></h1>
<div class="bg-white p-5">
    <form action="/staff/datastaff/{{ $staff->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <div>
                <label for="" class="form-text">Nama</label>
                <input type="text" name="name" value="{{ old('name', $staff->name) }}">
            </div>
            <div class="">
                <label for="" class="form-text">No. Telepon/Hp</label>
                <input type="text" name="phone" value="{{ old('phone', $staff->phone) }}">
            </div>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="/staff/datastaff" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection