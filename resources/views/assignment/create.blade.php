@extends('layouts.main')
@section('content')
<h1>Assignment <sup class="text-secondary">Tambah</sup></h1>
<div class="bg-white p-5 w-100">
    <form action="/assignment/dataassignment" method="post">
        @csrf
        <div class="form-group">
            <label for="staff_id" class="form-text">Staff</label>
            <select name="staff_id" class="form-control select2 @error('staff_id') is-invalid @enderror" data-width="100%">
                <option disable selected value>-- Pilih nama staff --</option>
                @foreach($staffs as $staff) 
                @if(old('staff_id') == $staff->id)
                <option value="{{ $staff->id }}" selected>{{ $staff->name }}</option>
                @else
                <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                @endif
                @endforeach
            </select>
            @error('staff_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="client_id">Klien</label>
            <select name="client_id" class="form-control select2 @error('client_id') is-invalid @enderror" data-width="100%">
                <option disable selected value>-- Pilih nama klien --</option>
                @foreach($clients as $client)
                @if(old('client_id') == $client->id)
                <option value="{{ $client->id }}" selected>{{ $client->company_name }}</option>
                @else
                <option value="{{ $client->id }}">{{ $client->company_name }}</option>
                @endif
                @endforeach
            </select>
            @error('client_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="activity_id">Aktivitas</label>
            <select name="activity_id" class="select2 form-control @error('activity_id') is-invalid @enderror" data-width="100%">
                <option disable selected value>-- Pilih aktivitas --</option>
                @foreach($activities as $activity)
                @if(old('activity_id') == $activity->id)
                <option value="{{ $activity->id }}" selected>{{ $activity->activity }}</option>
                @else
                <option value="{{ $activity->id }}">{{ $activity->activity }}</option>
                @endif
                @endforeach
            </select>
            @error('activity_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="startDate">Tanggal Mulai</label>
            <div class="input-group">
                <input type="text" name="startDate" value="{{ old('startDate') }}" class="form-control datepicker @error('startDate') is-invalid @enderror">
                <span class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa-solid fa-calendar-days"></i>
                    </span>
                </span>
            </div>
            @error('startDate')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="endDate">Tanggal Selesai</label>
            <div class="input-group">
                <input type="text" name="endDate" value="{{ old('endDate') }}" class="form-control datepicker @error('endDate') is-invalid @enderror">
                <span class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa-solid fa-calendar-days"></i>
                    </span>
                </span>
            </div>
            @error('endDate')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <textarea name="note" id="" class="form-control @error('note') is-invalid @enderror">{{ old('note') }}</textarea>
            @error('note')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="/assignment/dataassignment" class="btn btn-secondary">Batal</a>
    </form>
</div>
<script>
</script>
@endsection