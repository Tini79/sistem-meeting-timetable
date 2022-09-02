@extends('layouts.main')
@section('content')
<h1>Assignment <sup class="text-secondary">Detail</sup></h1>
<div class="bg-white p-5 w-100">
    <div class="row">
        <div class="col-3">
            <i class="fa-solid fa-user fa-8x"></i>
        </div>
        <div class="col">
            <h1>{{ $assignment->client->company_name }}</h1>
            <hr>
            <div class="row">
                <div class="col-4">
                    <p>Klien</p>
                    <p>Staff</p>
                    <p>Aktivitas</p>
                    <p>Tanggal Mulai</p>
                    <p>Tanggal Selesai</p>
                </div>
                <div class="col-1">
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                </div>
                <div class="col">
                    <p>{{ $assignment->client->company_name }}</p>
                    <p>{{ $assignment->staff->name }}</p>
                    <p>{{ $assignment->activity->activity }}</p>
                    <p>{{ date('d-m-Y', strtotime($assignment->startDate)) }}</p>
                    <p>{{ date('d-m-Y', strtotime($assignment->endDate)) }}</p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection