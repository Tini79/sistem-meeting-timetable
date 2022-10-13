@extends('layouts.main')
@section('content')
<div class="">
    <h1>Staff <sup class="text-secondary">Laporan</sup></h1>
</div>
<div class="w-100">
    <div class="row justify-content-end mr-1">
        <a href="/laporan/kinerjastaff/printpdf" target="_blank" class="btn btn-outline-primary">Print PDF</a>
    </div>
    <div class="mt-3 bg-white p-5">
        <div class="overflow-auto">
            <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
                <thead class="bg-primary">
                    <tr>
                        <th class="col-1 text-white">#</th>
                        <th class="col-2 text-white">Nama</th>
                        <th class="col-2 text-white">Tanggal Mulai</th>
                        <th class="col-2 text-white">Tanggal Selesai</th>
                        <th class="col-2 text-white">Klien</th>
                        <th class="col-2 text-white">Total Assignment</th>
                    </tr>
                    <tr class="filters">
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th class="clone"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staffs as $staff => $s)
                    <tr>
                        <td>{{ $staff + 1 }}.</td>
                        <td>{{ $s->name }}</td>
                        <td>
                            @foreach($s->assignments as $assignment)
                            <div>{{ $assignment->start_date->format('d-m-Y') }}</div>
                            </br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($s->assignments as $assignment)
                            <div>{{ $assignment->end_date->format('d-m-Y') }}</div>
                            </br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($s->assignments as $assignment)
                            <div>{{ $assignment->client->company_name }}</div>
                            </br>
                            @endforeach
                        </td>
                        <td class="text-center">{{ count($s->assignments) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection