@extends('layouts.main')
@section('content')
<h1>Assignment <span>Ubah</span></h1>
<div class="bg-white p-5">
    <form action="/assignment/dataassignment/{{ $assignment->id }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <div>
                <label for="" class="form-text">Staff</label>
                <select name="staff_id">
                    @foreach($staffs as $staff)
                    @if (old('staff_id', $assignment->client_id) == $staff->id)
                    <option value="{{ $staff->id }}" selected>{{ $staff->name }}</option>
                    @else
                    <option value="{{ $staff->id }}">{{ $staff->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label for="" class="form-text">Nama Perusahaan</label>
                <select name="client_id">
                    @foreach($clients as $client)
                    @if (old('client_id', $assignment->client_id) == $client->id)
                    <option value="{{ $client->id }}" selected>{{ $client->company_name }}</option>
                    @else
                    <option value="{{ $client->id }}">{{ $client->company_name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label for="" class="form-text">Aktivitas</label>
                <select name="activity_id">
                    @foreach($activities as $activity)
                    @if (old('activity_id', $assignment->activity_id) == $activity->id)
                    <option value="{{ $activity->id }}" selected>{{ $activity->activity }}</option>
                    @else
                    <option value="{{ $activity->id }}">{{ $activity->activity}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label for="" class="form-text">Tanggal</label>
                <input type="date" name="date" value="{{ old('date', $assignment->date) }}">
            </div>
            <div>
                <label for="" class="form-text">Note</label>
                <input type="text" name="note" value="{{ old('note', $assignment->note) }}">
            </div>
        </div>
        <button onClick="return confirm('Yakin menyimpan data ?') == true">Simpan</button>
        <a href="/assignment/dataassignment">Kembali</a>
    </form>
</div>

@endsection