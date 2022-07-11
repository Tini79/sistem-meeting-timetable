@extends('layouts.main')
@section('content')
<section>
    <h1>AKtivitas <span>Detail</span></h1>
    <div class="bg-white p-5">
    <table>
            <tr>
                <td>{{ $activity->id }}</td>
            </tr>
            <tr>
                <td>{{ $activity->activity }}</td>
            </tr>
        </table>
    </div>
</section>
@endsection