@extends('layouts.main')
@section('content')
<h1>Staff <span>Tambah</span></h1>
<div class="bg-white p-5">
    <form action="/staff/datastaff" method="post">
        @csrf
        <div class="form-group">
            <div>
                <label for="" class="form-text">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>
            <div class="">
                <label for="" class="form-text">No. Telepon/Hp</label>
                <input type="text" name="phone">
            </div>
        </div>
        <button class="btn btn-primary">Tambah</button>
        <a href="/staff/datastaff" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection