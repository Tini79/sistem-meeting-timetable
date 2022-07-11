@extends('layouts.main')
@section('content')
<h1>Klien <span>Tambah</span></h1>
<div class="bg-white p-5">
    <form action="/klien/dataklien" method="post">
        @csrf
        <div class="form-group">
            <div>
                <label for="company_name" class="form-text">Nama Perusahaan</label>
                <input type="text" name="company_name" value="{{ old('company_name') }}" class="@error('company_name') is-invalid @enderror">
                @error('company_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="addr" class="form-text">Alamat</label>
                <input type="text" name="addr" value="{{ old('addr') }}" class="@error('addr') is-invalid @enderror">
                @error('addr')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="phone" class="form-text">No. Tlp/Handphone</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button>Simpan</button>
        <a href="/klien/dataklien">Batal</a>
    </form>
</div>
@endsection