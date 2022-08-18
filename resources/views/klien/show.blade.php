@extends('layouts.main')
@section('content')
<h1>Klien <span>Detail</span></h1>
<div class="bg-white p-5 w-100">
    <table>
        <tr>
            <td>{{ $client->id }}</td>
        </tr>
        <tr>
            <td>{{ $client->company_name }}</td>
        </tr>
        <tr>
            <td>{{ $client->addr }}</td>
        </tr>
        <tr>
            <td>{{ $client->phone }}</td>
        </tr>
    </table>
</div>
@endsection