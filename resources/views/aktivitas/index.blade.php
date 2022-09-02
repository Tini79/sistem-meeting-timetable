@extends('layouts.main')
@section('content')
<div class="">
    <h1>Aktivitas <sup class="text-secondary">Daftar</sup></h1>
</div>
<div class="w-100">
    <div class="row justify-content-end mr-1">
        <a href="/aktivitas/dataaktivitas/create" class="btn btn-outline-primary">Tambah</a>
    </div>
    <div class="mt-3 bg-white p-5">
        <div class="overflow-auto">
            <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
                <thead class="bg-primary">
                    <tr>
                        <th class="col-1 text-white">#</th>
                        <th class="col-6 text-white">Aktivitas</th>
                        <th class="col-2 text-white">Aksi</th>
                    </tr>
                    <tr class="filters">
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity => $a)
                    <tr>
                        <td>{{ $activity + 1 }}.</td>
                        <td>{{ $a->activity }}</td>
                        <td>
                            <div class="btn-group">
                                <!-- <a href="/aktivitas/dataaktivitas/{{ $a->id }}" class="btn btn-sm"><i class="fa-regular fa-eye text-muted"></i></a> -->
                                <a href="/aktivitas/dataaktivitas/{{ $a->id }}/edit" class="btn btn-sm"><i class="fa-regular fa-pen-to-square text-info"></i></a>
                                <button class="btn btn-sm delete-btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                <form action="/aktivitas/dataaktivitas/{{ $a->id }}" method="post">
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