<header class="container py-5 d-flex justify-content-between">
    <ul class="d-flex list-unstyled">
        <li> <a href="{{ route('home') }}" class="me-3 ">Cretrix LLC</a></li>

    </ul>

    <ul class="d-flex list-unstyled">
        @if (Auth::check())
            <li><a href="{{ route('user.page') }}" class="me-3">Dashboard</a></li>
            <li><a href="{{ route('companies.company.index') }}" class="me-3">Company</a></li>
            <li><a href="{{ route('companies.company.employee.index') }}" class="me-3">Employee</a></li>
        @endif
    </ul>


    @if (!Route::is('login') && !Auth::check())
        <ul class="d-flex list-unstyled">
            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>

        </ul>
    @endif
    @if (Auth::check())
        <ul class="d-flex list-unstyled">
            <li>
                <a href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    @endif
</header>
