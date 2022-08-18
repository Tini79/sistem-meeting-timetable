@extends('layouts.main')
@section('content')
<h1>Staff <span>Detail</span></h1>
<div class="bg-white p-5 w-100">
    <table>
        <tr>
            <td>{{ $staff->id }}</td>
        </tr>
        <tr>
            <td>{{ $staff->name }}</td>
        </tr>
        <tr>
            <td>{{ $staff->phone }}</td>
        </tr>
    </table>
</div>
@endsection