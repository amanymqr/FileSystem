<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield('title', config('app.name'))</title>
@yield('style')
</head>
<body>

    <nav class="navbar navbar-light bg-light justify-content-between">
        <div class="container">
            <a class="navbar-brand" href="{{ route('file.form') }}">
                <img src="{{ asset('img/folders.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                <span class="fw-bold" style="color:#a258af">FILE</span>
            </a>

            <div class="d-flex">
                <!-- Social media icons -->
                <a href="#" class="mx-2">
                    <i style="color: #ba68c8" class="bi bi-facebook"></i>
                </a>
                <a href="#" class="mx-2">
                    <i style="color: #ba68c8" class="bi bi-twitter"></i>
                </a>
                <a href="#" class="mx-2">
                    <i style="color: #ba68c8" class="bi bi-github"></i>
                </a>

                <a href="{{ route('file.show') }}" class="mx-2">
                    <i style="color: #ba68c8" class="bi bi-file-earmark-text"></i>
                </a>

            </div>
        </div>
    </nav>

@yield('content')
@yield('script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<body>
</html>
