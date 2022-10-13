@extends('layouts.main')
@section('content')
<h1>Staff <sup class="text-secondary">Ubah</sup></h1>
<div class="bg-white p-5 w-100">
    <form action="/tools/user/datauser/{{ $user->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="username" class="form-text">Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control @error('username') is-invalid @enderror">
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-text">Password</label>
            <input type="password" name="password" value="" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

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
    <button class="btn btn-primary confirm-btn">Simpan</button>
    <a href="/tools/staff/datastaff" class="btn btn-secondary">Kembali</a>
</div>
@endsection