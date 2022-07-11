@extends('layouts.main')
@section('content')
<h1>Klien <span>Ubah</span></h1>
<div class="bg-white p-5">
    <form action="/klien/dataklien/{{ $client->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <div>
                <label for="" class="form-text">Nama Perusahaan</label>
                <input type="text" name="company_name" value="{{ old('company_name', $client->company_name) }}">
            </div>
            <div>
                <label for="" class="form-text">Alamat</label>
                <input type="text" name="addr" value="{{ old('addr', $client->addr) }}">
            </div>
            <div>
                <label for="" class="form-text">No. Tlp/Handphone</label>
                <input type="text" name="phone" value="{{ old('phone', $client->phone) }}">
            </div>
        </div>
        <button onClick="return confirm('Yakin menyimpan data ?') == true">Simpan</button>
        <a href="/klien/dataklien">Kembali</a>
    </form>
</div>
@endsection