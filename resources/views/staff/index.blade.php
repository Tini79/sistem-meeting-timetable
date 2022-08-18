@extends('layouts.main')
@section('content')
<div class="">
    <h1>Staff <sup class="text-secondary">Daftar</sup></h1>
</div>
<div class="w-100">
    <div class="row justify-content-end mr-1">
        <a href="/staff/datastaff/create" class="btn btn-outline-primary">Tambah</a>
    </div>
    <div class="mt-3 bg-white p-5">
        <div>
            <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
                <thead class="bg-primary">
                    <tr>
                        <th class="col-1 text-white">#</th>
                        <th class="col-1 text-white">Kode</th>
                        <th class="col-2 text-white">Nama</th>
                        <th class="col-2 text-white">No. Tlp/Handphone</th>
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
                    @foreach($staffs as $staff => $s)
                    <tr>
                        <td>{{ $staff + 1 }}.</td>
                        <td class="text-center text-uppercase">{{ $s->letter_code }}</td>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->phone }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="/staff/datastaff/{{ $s->id }}" class="btn btn-sm"><i class="fa-regular fa-eye text-muted"></i></a>
                                <a href="/staff/datastaff/{{ $s->id }}/edit" class="btn btn-sm"><i class="fa-regular fa-pen-to-square text-info"></i></a>
                                <button class="btn btn-sm delete-btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                <form action="/staff/datastaff/{{ $s->id }}" method="post">
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
                                                    <h4 class="modal-title w-100">Are you sure?</h4>	
                                                </div>
                                                <div class="modal-body">
                                                    <p>Do you really want to delete this record? This process cannot be undone.</p>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Cancel</button>
                                                    <button class="btn btn-danger">Delete</button>
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