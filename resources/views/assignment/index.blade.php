@extends('layouts.main')
@section('content')
<div class="">
    <h1>Assignment <sup class="text-secondary">Daftar</sup></h1>
</div>
<div class="w-100">
    <div class="row justify-content-end mr-1">
        <a href="/assignment/dataassignment/create" class="btn btn-outline-primary">Tambah</a>
    </div>
    <div class="mt-3 bg-white p-5">
        <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
            <thead class="bg-primary">
                <tr>
                    <th class="col-1 text-white">#</th>
                    <th class="col-3 text-white sorting sorting_asc">Staff</th>
                    <th class="col-2 text-white sorting">Klien</th>
                    <th class="col-1 text-white sorting">Aktivitas</th>
                    <th class="col-3 text-white sorting">Tanggal Mulai</th>
                    <th class="col-3 text-white sorting">Tanggal Selesai</th>
                    <th class="col-2 text-white sorting">Aksi</th>
                </tr>
                <tr class="filters">
                    <th class="clone"></th>
                    <th class="clone"></th>
                    <th class="clone"></th>
                    <th class="clone"></th>
                    <th class="clone"></th>
                    <th class="clone"></th>
                    <th></th>
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
                            <button class="btn btn-sm delete-btn"><i class="fa-solid fa-trash text-danger"></i></button>
                            <form action="/assignment/dataassignment/{{ $a->id }}" method="post">
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
@endsection