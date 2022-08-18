@extends('layouts.main')
@section('content')
<h1>Klien <sup class="text-secondary">Tambah</sup></h1>
<div class="bg-white p-5 w-100">
    <form action="/klien/dataklien" method="post">
        @csrf
        <div class="form-group">
            <label for="company_name" class="form-text">Nama Perusahaan</label>
            <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control @error('company_name') is-invalid @enderror">
            @error('company_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="addr" class="form-text">Alamat</label>
            <input type="text" name="addr" value="{{ old('addr') }}" class="form-control @error('addr') is-invalid @enderror">
            @error('addr')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone" class="form-text">No. Tlp/Handphone</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="/klien/dataklien" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection