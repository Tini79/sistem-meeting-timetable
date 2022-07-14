@extends('layouts.main')
@section('content')
<h1>Assignment <sup class="text-secondary">Tambah</sup></h1>
<div class="bg-white p-5">
    <form action="/assignment/dataassignment" method="post">
        @csrf
        <div class="form-group">
            <label for="staff_id" class="form-text">Staff</label>
            <select name="staff_id" class="form-control @error('staff_id') is-invalid @enderror">
                <option disable selected value>-- Pilih nama staff --</option>
                @foreach($staffs as $staff) 
                <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                @endforeach
            </select>
            @error('staff_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="client_id">Klien</label>
            <select name="client_id" class="form-control @error('client_id') is-invalid @enderror">
                <option disable selected value>-- Pilih nama klien --</option>
                @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="activity_id">Aktivitas</label>
            <select name="activity_id" class="form-control @error('activity_id') is-invalid @enderror">
                <option disable selected value>-- Pilih aktivitas --</option>
                @foreach($activities as $activity)
                <option value="{{ $activity->id }}">{{ $activity->activity }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="startDate">Tanggal Mulai</label>
            <input type="date" name="startDate" value="{{ old('startDate') }}" class="form-control @error('startDate') is-invalid @enderror">
            @error('startDate')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="endDate">Tanggal Selesai</label>
            <input type="date" name="endDate" value="{{ old('endDate') }}" class="form-control @error('endDate') is-invalid @enderror">
            @error('endDate')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <textarea name="" id="" class="form-control @error('note') is-invalid @enderror"></textarea>
            @error('note')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="/assignment/dataassignment" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection