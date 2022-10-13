@extends('layouts.main')
@section('content')
<div class="container col-md-5 mt-5">
    <div class="bg-white p-5">
        <form action="/" method="post">
            @csrf
            <h1 class="text-center">Login</h1>
            @if(session()->has('danger'))
            <div class="alert alert-danger">{{ session('danger') }}</div>
            @endif
            <div class="form-group">
                <label for="username" class="form-text">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username">
                @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="form-text">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </form>
    </div>
</div>
@endsection