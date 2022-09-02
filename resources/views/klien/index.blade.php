@extends('layouts.main')
@section('content')
<div class="">
    <h1>Klien <sup class="text-secondary">Daftar</sup></h1>
</div>
<div class="w-100">
    <div class="row justify-content-end mr-1">
        <a href="/klien/dataklien/create" class="btn btn-outline-primary">Tambah</a>
    </div>
    <div class="mt-3 bg-white p-5">
        <div class="overflow-auto">
            <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
                <thead class="bg-primary">
                    <tr>
                        <th class="col-1 text-white">#</th>
                        <th class="col-3 text-white">Nama Perusahaan</th>
                        <th class="col-3 text-white">Alamat</th>
                        <th class="col-3 text-white">No. Tlp/Handphone</th>
                        <th class="col-2 text-white">Aksi</th>
                    </tr>
                    <tr class="filters">
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client => $c)
                    <tr>
                        <td>{{ $client + 1 }}.</td>
                        <td>{{ $c->company_name }}</td>
                        <td>{{ $c->addr }}</td>
                        <td>{{ $c->phone }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="/klien/dataklien/{{ $c->id }}" class="btn btn-sm"><i class="fa-regular fa-eye text-muted"></i></a>
                                <a href="/klien/dataklien/{{ $c->id }}/edit" class="btn btn-sm"><i class="fa-regular fa-pen-to-square text-info"></i></a>
                                <button class="btn btn-sm delete-btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                <form action="/klien/dataklien/{{ $c->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Modal HTML -->
                                    <div id="myModal" class="modal fade">
                                        <div class="modal-dialog modal-confirm">
                                            <div class="modal-content">
                                                <div class="modal-header flex-column">
                                                    <div class="icon-box">
                                                        <i class="material-icons">&#xE5CD;</i>
                                                    </div>
                                                    <h4 class="modal-title w-100">Apakah Anda yakin?</h4>							
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin untuk menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>     
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection