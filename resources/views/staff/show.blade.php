@extends('layouts.main')
@section('content')
<h1>Staff <sup class="text-secondary">Detail</sup></h1>
<div class="bg-white p-5 w-100">
    <div class="row">
        <div class="col-3">
            <i class="fa-solid fa-user fa-8x"></i>
        </div>
        <div class="col">
            <h1>{{ $staff->name }}</h1>
            <hr>
            <div class="row">
                <div class="col-4">
                    <p>No. Tlp/Handphone</p>
                </div>
                <div class="col-1">
                    <p>:</p>
                </div>
                <div class="col">
                    <p>{{ $staff->phone }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection