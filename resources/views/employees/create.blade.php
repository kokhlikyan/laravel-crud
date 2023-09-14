@extends('layouts.base')

@section('content')
    <form action="{{ route('companies.company.employee.store') }}" method="POST"
        class="d-flex flex-column border rounded p-3 justify-content-center" style="width: 400px"
        enctype="multipart/form-data">
        <h2>Create Employee</h2>
        @csrf
        <input type="text" placeholder="First name" name="first_name" class="mb-3 form-control">
        <input type="text" placeholder="Last name" name="last_name" class="mb-3 form-control">
        <select name="company_id" id="" class="mb-3 form-control">
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach

        </select>
        <button class="align-self-center btn btn-primary">Create</button>
    </form>
@endsection
