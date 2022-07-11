@extends('layouts.main')
@section('content')
<section>
    <h1>Staff <span>Detail</span></h1>
    <div class="bg-white p-5">
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
</section>
@endsection