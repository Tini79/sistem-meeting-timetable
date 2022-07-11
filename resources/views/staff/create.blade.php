@extends('layouts.main')
@section('content')
<h1>Staff <span>Tambah</span></h1>
<div class="bg-white p-5">
    <form action="/staff/datastaff" method="post">
        @csrf
        <div class="form-group">
            <div>
                <label for="name" class="form-text">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" classs="@error('name') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                <label for="phone" class="form-text">No. Telepon/Hp</label>
                <input type="text" name="phone" value="{{ old('phone') }}" classs="@error('phone') is-invalid @enderror">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary">Tambah</button>
        <a href="/staff/datastaff" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection