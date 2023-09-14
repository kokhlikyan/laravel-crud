@extends('layouts.base')
@section('style')
    <style>
        #create_employee {
            width: 70px;
            height: 70px;

            position: fixed;
            bottom: 100px;
            right: 50px;

        }

        #create_employee a {
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
    <div class="d-flex flex-wrap gap-3">
        <ul class="list-group list-group-flush">
            @foreach ($data as $employee)
                <li class="list-group-item">
                    <div class="d-flex align-items-center gap-5">
                        <h2>{{ $employee->first_name }} {{ $employee->last_name }}</h2>
                        <div class="d-flex gap-2 align-items-center">
                            <a href="{{ route('companies.company.employee.edit', $employee->id) }}"
                                class="btn btn btn-outline-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pen" viewBox="0 0 16 16">
                                    <path
                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                </svg>
                            </a>
                            <form action="{{ route('companies.company.employee.destroy', $employee->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg>
                                </button>
                            </form>

                        </div>

                    </div>
                    <h6>Company: {{ $employee->company->name }}</h2>

                </li>
            @endforeach
        </ul>
    </div>
    <div class="my-5 d-flex justify-content-center">
        {{ $data->links('components.paginate') }}
    </div>
    <div id="create_employee">
        <a href="{{ route('companies.company.employee.create') }}" class="btn btn-outline-primary">+</a>
    </div>
@endsection
