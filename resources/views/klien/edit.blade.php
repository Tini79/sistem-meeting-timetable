@extends('layouts.main')
@section('content')
<h1>Klien <sup class="text-secondary">Ubah</sup></h1>
<div class="bg-white p-5">
    <form action="/klien/dataklien/{{ $client->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="company_name" class="form-text">Nama Perusahaan</label>
            <input type="text" name="company_name" value="{{ old('company_name', $client->company_name) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="addr" class="form-text">Alamat</label>
            <input type="text" name="addr" value="{{ old('addr', $client->addr) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone" class="form-text">No. Tlp/Handphone</label>
            <input type="text" name="phone" value="{{ old('phone', $client->phone) }}" class="form-control">
        </div>
        <button onClick="return confirm('Yakin menyimpan data ?') == true" class="btn btn-primary">Simpan</button>
        <a href="/klien/dataklien" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection