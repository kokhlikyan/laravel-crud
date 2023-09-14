@extends('layouts.base')
@section('style')
    <style>
        #create_company {
            width: 70px;
            height: 70px;
            position: fixed;
            bottom: 100px;
            right: 50px;

        }

        #create_company a {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            font-weight: bold;
            border-radius: 50%;
        }
    </style>
@endsection
@section('content')
    <div class="d-flex flex-wrap gap-3 container py-5">
        @forelse ($data as $company)
            <div class="card" style="width: 18rem;">
                <img src="{{ URL::asset($company->logo) }}" class="card-img-top " alt="company logo">
                <div class="card-body">
                    <a href="{{ route('companies.company.show', $company->id) }}">
                        <h5 class="card-title">{{ $company->name }}</h5>
                    </a>
                    <p class="card-text">{{ $company->email }}</p>
                    <div class="d-flex gap-3">
                        <a href="{{ $company->website }}" class="btn btn-primary" target="_blank">Website</a>
                        <a href="{{ route('companies.company.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('companies.company.destroy', $company->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                </div>
            </div>
        @empty
            <h2>You don't have any companies...</h2>
        @endforelse

    </div>
    <div id="create_company">
        <a href="{{ route('companies.company.create') }}" class="btn btn-outline-primary">+</a>
    </div>
@endsection
