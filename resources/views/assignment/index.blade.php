@extends('layouts.main')
@section('content')
<div class="">
    <h1>Assignment <sup class="text-secondary">Daftar</sup></h1>
</div>
<div class="row justify-content-end mr-1">
    <a href="/assignment/dataassignment/create" class="btn btn-outline-primary">Tambah</a>
</div>
<div class="mt-3 bg-white p-5">
    <!-- <div class="d-inline-flex float-right mb-2">
        <form action="/assignment/dataassignment">
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div> -->
    <div>
    <!-- <div id="demo_info" class="box"></div>
    <div id="example_wrapper" class="dataTables_wrapper"> -->
        <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
            <thead class="bg-secondary">
                <tr>
                    <th class="col-1 text-white">#</th>
                    <th class="col-3 text-white sorting sorting_asc">Staff</th>
                    <th class="col-2 text-white sorting">Klien</th>
                    <th class="col-1 text-white sorting">Aktivitas</th>
                    <th class="col-3 text-white sorting">Tanggal Mulai</th>
                    <th class="col-3 text-white sorting">Tanggal Selesai</th>
                    <th class="col-2 text-white sorting">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignments as $assignment => $a)
                <tr>
                    <td>{{ $assignment + 1 }}.</td>
                    <td>{{ $a->staff->name }}</td>
                    <td>{{ $a->client->company_name }}</td>
                    <td>{{ $a->activity->activity }}</td>
                    <td>{{ showDateTime($a->startDate, 'd-m-Y') }}</td>
                    <td>{{ showDateTime($a->endDate, 'd-m-Y') }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="/assignment/dataassignment/{{ $a->id }}" class="btn btn-sm"><i class="fa-regular fa-eye text-muted"></i></a>
                            <a href="/assignment/dataassignment/{{ $a->id }}/edit" class="btn btn-sm"><i class="fa-regular fa-pen-to-square text-info"></i></a>
                            <form action="/assignment/dataassignment/{{ $a->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm" onClick="return confirm('Yakin hapus data ?') == true"><i class="fa-solid fa-trash text-danger"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <!-- </div>
</div> -->
@endsection