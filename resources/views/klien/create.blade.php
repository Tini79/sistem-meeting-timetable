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
    <a href="/klien/dataklien" class="btn btn-secondary">Batal</a>

</div>
@endsection