<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        #alert {
            position: fixed;
            top: 50px;
            left: 50%;
            transform: translateX(-50%)
        }
    </style>
    @yield('style')

</head>

<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div id="alert" class="alert alert-danger fixed top-10 left-100/2" role="alert">{{ $error }}
            </div>
        @endforeach
    @endif
    <div class="d-flex flex-column min-vh-100 align-items-center">
        @include('components.header')
        <main class="flex-grow-1">
            @yield('content')
        </main>
        @include('components.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
