@extends('layouts.main')
@section('content')
<h1>Staff <sup class="text-secondary">Ubah</sup></h1>
<div class="bg-white p-5 w-100">
    <form action="/staff/datastaff/{{ $staff->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="" class="form-text">Nama</label>
            <input type="text" name="name" value="{{ old('name', $staff->name) }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- additional to add to users table -->
        <div class="form-group">
            <label for="username" class="form-text">Username</label>
            <input type="text" name="username" value="{{ old('username', $staff->user->username) }}" class="form-control @error('username') is-invalid @enderror">
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- those all -->
        <div class="form-group">
            <label for="letter_code" class="form-text">Kode</label>
            <input type="text" name="letter_code" value="{{ old('letter_code', $staff->letter_code) }}" class="form-control @error('letter_code') is-invalid @enderror">
            @error('letter_code')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-text">No. Telepon/Hp</label>
            <input type="text" name="phone" value="{{ old('phone', $staff->phone) }}" class="form-control @error('phone') is-invalid @enderror">
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button onClick="return confirm('Yakin menyimpan data ?') == true" class="btn btn-primary">Simpan</button>
        <a href="/staff/datastaff" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection