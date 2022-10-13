@extends('layouts.main')
@section('content')
<h1>Assignment <sup class="text-secondary">Ubah</sup></h1>
<div class="bg-white p-5 w-100">
    <form action="/assignment/dataassignment/{{ $assignment->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="staff_id" class="form-text">Staff</label>
            <select name="staff_id" class="form-control select2 @error('staff_id') is-invalid @enderror" data-width="100%">
                <option disable selected value>-- Pilih nama staff --</option>
                @foreach($staffs as $staff)
                @if (old('staff_id', $assignment->staff_id) == $staff->id)
                <option value="{{ $staff->id }}" selected>{{ $staff->name }}</option>
                @else
                <option value="{{ $staff->id }}">{{ $staff->name}}</option>
                @endif
                @endforeach
            </select>
            @error('staff_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="client_id" class="form-text">Nama Perusahaan</label>
            <select name="client_id" class="form-control select2 @error('client_id') is-invalid @enderror" data-width="100%">
                <option disable selected value>-- Pilih nama klien --</option>
                @foreach($clients as $client)
                @if (old('client_id', $assignment->client_id) == $client->id)
                <option value="{{ $client->id }}" selected>{{ $client->company_name }}</option>
                @else
                <option value="{{ $client->id }}">{{ $client->company_name}}</option>
                @endif
                @endforeach
            </select>
            @error('client_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="activity_id" class="form-text">Aktivitas</label>
            <select name="activity_id" class="form-control select2 @error('activity_id') is-invalid @enderror" data-width="100%">
                <option disable selected value>-- Pilih nama aktivitas --</option>
                @foreach($activities as $activity)
                @if(old('activity_id', $assignment->activity_id) == $activity->id)
                <option value="{{ $activity->id }}" selected>{{ $activity->activity }}</option>
                @else
                <option value="{{ $activity->id }}">{{ $activity->activity}}</option>
                @endif
                @endforeach
            </select>
            @error('activity_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="start_date" class="form-text">Tanggal Mulai</label>
            <div class="input-group">
                <input type="text" name="start_date" class="form-control datepicker @error('start_date') is-invalid @enderror" value="{{ old('start_date', $assignment->start_date) }}">
                <span class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa-solid fa-calendar-days"></i>
                    </span>
                </span>
            </div>
            @error('start_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="end_date" class="form-text">Tanggal Selesai</label>
            <div class="input-group">
                <input type="text" name="end_date" value="{{ old('end_date', $assignment->end_date) }}" class="form-control datepicker @error('end_date') is-invalid @enderror">
                <span class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa-solid fa-calendar-days"></i>
                    </span>
                </span>
            </div>
            @error('end_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="note" class="form-text">Note</label>
            <textarea name="note" id="" class="form-control @error('note') is-invalid @enderror">{{ old('note', $assignment->note) }}</textarea>
            @error('note')
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
    <a href="/assignment/dataassignment" class="btn btn-secondary">Kembali</a>
</div>

@endsection