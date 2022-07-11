@extends('layouts.main')
@section('content')
<h1>Assignment <span>Tambah</span></h1>
<div class="bg-white p-5">
    <form action="/assignment/dataassignment" method="post">
        @csrf
        <div class="form-group">
            <div>
                <label for="">Staff</label>
                <select name="staff_id" class="@error('staff_id') is-invalid @enderror">
                    <option disable selected value></option>
                    @foreach($staffs as $staff) 
                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                    @endforeach
                </select>
                @error('staff_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="">Klien</label>
                <select name="client_id">
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->company_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Aktivitas</label>
                <select name="activity_id">
                    @foreach($activities as $activity)
                    <option value="{{ $activity->id }}">{{ $activity->activity }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Tanggal Mulai</label>
                <input type="date" name="startDate" value="{{ old('startDate') }}">
            </div>
            <div>
                <label for="">Tanggal Selesai</label>
                <input type="date" name="endDate" value="{{ old('endDate') }}">
            </div>
            <div>
                <label for="">Note</label>
                <input type="text" name="note" value="{{ old('note') }}">
            </div>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="/assignment/dataassignment" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection