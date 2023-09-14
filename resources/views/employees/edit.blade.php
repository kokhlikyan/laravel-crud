@extends('layouts.base')

@section('content')
    <form action="{{ route('companies.company.employee.update', $employeer->id) }}" method="POST"
        class="d-flex flex-column border rounded p-3 justify-content-center" style="width: 400px"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2>Edit Employee</h2>

        <input type="text" placeholder="First name" name="first_name" value="{{ $employeer->first_name }}"
            class="mb-3 form-control">
        <input type="text" placeholder="Last name" name="last_name" value="{{ $employeer->last_name }}"
            class="mb-3 form-control">
        <select name="company_id" id="" class="mb-3 form-control">
            @foreach ($companies as $company)
                <option {{ $employeer->company_id === $company->id ? 'selected' : '' }} value="{{ $company->id }}">
                    {{ $company->name }}</option>
            @endforeach

        </select>
        <button class="align-self-center btn btn-primary">Save</button>
    </form>
@endsection
