@extends('layouts.main')
@section('content')
<h1>Aktivitas <sup class="text-secondary">Ubah</sup></h1>
<div class="bg-white p-5 w-100">
    <form action="/tools/aktivitas/dataaktivitas/{{ $activity->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <lable for="activity" class="form-text">Aktivitas</lable>
            <input type="text" name="activity" value="{{ old('activity', $activity->activity) }}" class="form-control @error('activity') is-invalid @enderror">
            @error('activity')
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
    <a href="/tools/aktivitas/dataaktivitas" class="btn btn-secondary">Kembali</a>
</div>
@endsection