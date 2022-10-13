@extends('layouts.main')
@section('content')
<div class="">
    <h1>Klien <sup class="text-secondary">Laporan</sup></h1>
</div>
<div class="w-100">
    <div class="row justify-content-end mr-1">
        <a href="/laporan/klien/printpdf" target="_blank" class="btn btn-outline-primary">Print PDF</a>
    </div>
    <div class="mt-3 bg-white p-5">
        <div>
            <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
                <thead class="bg-primary">
                    <tr>
                        <th class="col-1 text-white">#</th>
                        <th class="col-3 text-white">Nama Perusahaan</th>
                        <th class="col-3 text-white">Alamat</th>
                        <th class="col-3 text-white">No. Tlp/Handphone</th>
                    </tr>
                    <tr class="filters">
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th class="clone"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client => $c)
                    <tr>
                        <td>{{ $client + 1 }}.</td>
                        <td>{{ $c->company_name }}</td>
                        <td>{{ $c->addr }}</td>
                        <td>{{ $c->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection