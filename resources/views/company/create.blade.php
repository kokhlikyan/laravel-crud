@extends('layouts.base')

@section('content')
    <form action="{{ route('companies.company.store') }}" method="POST"
        class="d-flex flex-column border rounded p-3 justify-content-center" style="width: 400px"
        enctype="multipart/form-data">
        <h2>Create Company</h2>
        @csrf
        <input type="text" placeholder="Name" name="name" class="mb-3 form-control">
        <input type="email" placeholder="Email" name="email" class="mb-3 form-control">
        <input type="url" placeholder="Website" name="url" class="mb-3 form-control">
        <input type="file" placeholder="Logo" name="logo" class="mb-3 form-control">
        <button class="align-self-center btn btn-primary">Create</button>
    </form>
@endsection
