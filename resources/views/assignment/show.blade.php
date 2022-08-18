@extends('layouts.main')
@section('content')
<h1>Klien <span>Detail</span></h1>
<div class="bg-white p-5 w-100">
    <table>
        <tr>
            <td>{{ $assignment->id }}</td>
        </tr>
        <tr>
            <td>{{ $assignment->staff->name }}</td>
        </tr>
        <tr>
            <td>{{ $assignment->client->company_name }}</td>
        </tr>
        <tr>
            <td>{{ $assignment->activity->activity }}</td>
        </tr>
        <tr>
            <td>{{ $assignment->date }}</td>
        </tr>
        <tr>
            <td>{{ $assignment->note }}</td>
        </tr>
    </table>
</div>

@endsection