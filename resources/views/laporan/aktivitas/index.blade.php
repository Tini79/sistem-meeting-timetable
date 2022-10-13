@extends('layouts.main')
@section('content')
<div class="">
    <h1>Aktivitas <sup class="text-secondary">Laporan</sup></h1>
</div>
<div class="w-100">
    <div class="row justify-content-end mr-1">
        <a href="/laporan/aktivitas/printpdf" target="_blank" class="btn btn-outline-primary">Print PDF</a>
    </div>
    <div class="mt-3 bg-white p-5">
        <div class="overflow-auto">
            <table id="example" class="display dataTable table" style="width:100%" aria-describedby="example_info">
                <thead class="bg-primary">
                    <tr>
                        <th class="col-1 text-white">#</th>
                        <th class="col-3 text-white">Aktivitas</th>
                        <th class="col-4 text-white">Handler</th>
                    </tr>
                    <tr class="filters">
                        <th class="clone"></th>
                        <th class="clone"></th>
                        <th class="clone"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity => $a)
                    <tr>
                        <td>{{ $activity + 1 }}.</td>
                        <td>{{ $a->activity }}</td>
                        <td>
                            @foreach($a->assignments as $assignment)
                            @if($a->id == $assignment->activity_id)
                            @if($staff != $assignment->staff->name)
                            <div>{{ $staff = $assignment->staff->name }}</div>
                            @endif
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection