@extends('layouts.main')
@section('content')
<h1>AKtivitas <span>Detail</span></h1>
<div class="bg-white p-5 w-100">
    <table>
        <tr>
            <td>{{ $activity->id }}</td>
        </tr>
        <tr>
            <td>{{ $activity->activity }}</td>
        </tr>
    </table>
</div>
@endsection