@extends('layouts.main')
@section('content')
<h1>Assignment <sup class="text-secondary">Ubah</sup></h1>
<div class="bg-white p-5">
    <form action="/assignment/dataassignment/{{ $assignment->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="staff_id" class="form-text">Staff</label>
            <select name="staff_id" class="form-control">
                <option disable selected value>-- Pilih nama staff --</option>
                @foreach($staffs as $staff)
                @if (old('staff_id', $assignment->client_id) == $staff->id)
                <option value="{{ $staff->id }}" selected>{{ $staff->name }}</option>
                @else
                <option value="{{ $staff->id }}">{{ $staff->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="client_id" class="form-text">Nama Perusahaan</label>
            <select name="client_id" class="form-control">
                <option disable selected value>-- Pilih nama klien --</option>
                @foreach($clients as $client)
                @if (old('client_id', $assignment->client_id) == $client->id)
                <option value="{{ $client->id }}" selected>{{ $client->company_name }}</option>
                @else
                <option value="{{ $client->id }}">{{ $client->company_name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="" class="form-text">Aktivitas</label>
            <select name="activity_id" class="form-control">
                <option disable selected value>-- Pilih nama aktivitas --</option>
                @foreach($activities as $activity)
                @if (old('activity_id', $assignment->activity_id) == $activity->id)
                <option value="{{ $activity->id }}" selected>{{ $activity->activity }}</option>
                @else
                <option value="{{ $activity->id }}">{{ $activity->activity}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="startDate" class="form-text">Tanggal Mulai</label>
            <input type="date" name="startDate" value="{{ old('startDate', $assignment->startDate) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="endDate" class="form-text">Tanggal Selesai</label>
            <input type="date" name="endDate" value="{{ old('endDate', $assignment->endDate) }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="note" class="form-text">Note</label>
            <textarea name="" id="" class="form-control">{{ old('note', $assignment->note) }}</textarea>
        </div>
        <button onClick="return confirm('Yakin menyimpan data ?') == true" class="btn btn-primary">Simpan</button>
        <a href="/assignment/dataassignment" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection