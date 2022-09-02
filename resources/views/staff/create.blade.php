@extends('layouts.main')
@section('content')
<h1>Staff <sup class="text-secondary">Tambah</sup></h1>
<div class="bg-white p-5 w-100">
    <form action="/staff/datastaff" method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="form-text">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- additional to add to users table -->
        <div class="form-group">
            <label for="username" class="form-text">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror">
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- those all -->
        <div class="form-group">
            <label for="letter_code" class="form-text">Kode</label>
            <input type="text" name="letter_code" value="{{ old('letter_code') }}" class="form-control @error('letter_code') is-invalid @enderror">
            <!-- <select name="letter_code" id="" class="form-control select2">
                <option disable selected value>-- Pilih kode Staff --</option>
                <option value=""></option>
            </select> -->
            @error('letter_code')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone" class="form-text">No. Telepon/Hp</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- additional -->
        <div class="form-group">
            <label for="password" class="form-text">Password</label>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- done -->

        <!-- Modal HTML -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                            <i class="material-icons">&#x21;</i>
                        </div>						
                        <h4 class="modal-title w-100">Apakah Anda yakin?</h4>	
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda ingin menyimpan data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>     
    </form>
    <button class="btn btn-primary confirm-btn">Tambah</button>
    <a href="/staff/datastaff" class="btn btn-secondary">Batal</a>
</div>
@endsection