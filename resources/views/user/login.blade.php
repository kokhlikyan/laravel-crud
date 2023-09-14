@extends('layouts.base')
@section('content')
    <form action="{{ route('login') }}" method="POST" class="d-flex flex-column border rounded p-3 justify-content-center"
        style="width: 300px">
        <h2>Login</h2>
        @csrf
        <input type="email" placeholder="email" name="email" class="mb-3 form-control">
        <input type="password" placeholder="password" name="password" class="mb-3 form-control">
        <button class="align-self-center btn btn-primary">Login</button>
    </form>
@endsection
