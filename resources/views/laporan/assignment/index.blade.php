@extends('layouts.main')
@section('content')
<div class="">
    <h1>Assignment <sup class="text-secondary">Laporan</sup></h1>
</div>
<div class="w-100">
    <div class="row justify-content-end mr-1">
        <a href="/laporan/assignment/printpdf" target="_blank" class="btn btn-outline-primary">Print PDF</a>
    </div>
    <div class="mt-3 bg-white p-5">
        <div class="overflow-auto">
            <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
                <thead class="bg-primary">
                    <tr>
                        <th class="col-1 text-white">#</th>
                        <th class="col-3 text-white">Staff</th>
                        <th class="col-2 text-white">Klien</th>
                        <th class="col-1 text-white">Aktivitas</th>
                        <th class="col-3 text-white">Tanggal Mulai</th>
                        <th class="col-3 text-white">Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignments as $assignment => $a)
                    <tr>
                        <td>{{ $assignment + 1 }}.</td>
                        <td class="text-center text-uppercase">{{ $a->staff->name }}</td>
                        <td>{{ $a->client->company_name }}</td>
                        <td>{{ $a->activity->activity }}</td>
                        <td>{{ showDateTime($a->startDate, 'd-m-Y') }}</td>
                        <td>{{ showDateTime($a->endDate, 'd-m-Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection