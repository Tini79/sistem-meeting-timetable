@extends('layouts.main')
@section('content')
<div class="">
    <h1>Staff <sup class="text-secondary">Daftar</sup></h1>
</div>
<div class="w-100">
    <div class="row justify-content-end mr-1">
        <a href="/tools/staff/datastaff/create" class="btn btn-outline-primary">Tambah</a>
    </div>
    <div class="mt-3 bg-white p-5">
        <div class="overflow-auto">
            <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
                <thead class="bg-primary">
                    <tr>
                        <th class="col-1 text-white">#</th>
                        <th class="col-1 text-white">Username</th>
                        <th class="col-1 text-white">Level</th>
                        <th class="col-2 text-white">Aksi</th>
                    </tr>
                    <tr class="filters">
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user => $u)
                    <tr>
                        <td>{{ $user + 1 }}.</td>
                        <td class="col-5">{{ $u->username }}</td>
                        <td class="col-5">{{ $u->level }}</td>
                        <td class="col-2">
                            <div class="btn-group">
                                <a href="/tools/user/datauser/{{ $u->id }}/edit" class="btn btn-sm"><i class="fa-regular fa-pen-to-square text-info"></i></a>
                                <button class="btn btn-sm delete-btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                <form action="/tools/user/datauser/{{ $u->id }}" method="post">
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