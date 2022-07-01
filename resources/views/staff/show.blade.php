@extends('layouts.main')
@section('content')
<h1>Staff <span>Detail</span></h1>
<div class="bg-white p-5">
    <table>
        <tr>
            <td>{{ $staff->name }}</td>
            <td>{{ $staff->phone }}</td>
        </tr>
    </table>
</div>
@endsection