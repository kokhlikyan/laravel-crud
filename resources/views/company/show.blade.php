@extends('layouts.base')

@section('content')
    <div class="card" style="width: 100%">
        <img src="{{ URL::asset($company->logo) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $company->name }}</h5>
            <p class="card-text">{{ $company->email }}</p>
        </div>

        <div class="card-body">
            <h5 class="card-title">Company employees</h5>
            <ul class="list-group list-group-flush">
                @foreach ($company->employees as $employee)
                    <li class="list-group-item">{{ $employee->first_name }} {{ $employee->last_name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="card-body">
            <a href="{{ $company->website }}" class="card-link">Website</a>
        </div>
    </div>
@endsection
