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

    <nav class="navbar navbar-light bg-light justify-content-between shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('file.form') }}">

                <svg width="40" height="20" viewBox="0 0 34 16" fill="none" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.4136 11.9959C10.0873 11.4809 9.82024 11.2083 9.34554 11.2083C8.87085 11.2083 8.60383 11.4809 8.27748 11.9959L6.8534 14.2677C6.31937 15.1461 5.87434 15.752 4.83595 15.752C3.79755 15.752 3.32286 15.3279 2.8185 14.1465C2.19546 12.6926 1.54276 10.9357 0.949389 8.57293C0.296684 5.9371 0 4.30137 0 2.96855C0 1.63573 0.415357 0.848157 1.83944 0.575535C3.79755 0.212039 6.43804 0 9.34554 0C12.253 0 14.8935 0.212039 16.8516 0.575535C18.2757 0.848157 18.6911 1.63573 18.6911 2.96855C18.6911 4.30137 18.3944 5.9371 17.7417 8.57293C17.1483 10.9357 16.4956 12.6926 15.8726 14.1465C15.3682 15.3279 14.8935 15.752 13.8551 15.752C12.8167 15.752 12.3717 15.1461 11.8377 14.2677L10.4136 11.9959ZM32.9913 14.122C31.9826 15.2124 30.0838 16 27.5917 16C22.5777 16 19.6108 12.5165 19.6108 7.94252C19.6108 3.03532 23.0227 0.12735 27.4433 0.12735C31.3892 0.12735 34 2.21745 34 5.03455C34 7.70019 31.7749 9.42679 29.2531 9.42679C27.8883 9.42679 26.8796 9.15417 26.1972 8.60893C25.9302 8.39689 25.7819 8.42718 25.7819 8.66951C25.7819 9.66912 26.1379 10.5173 26.7906 11.1837C27.3246 11.7289 28.3334 12.0924 29.2828 12.0924C30.2618 12.0924 31.1222 11.8804 31.8936 11.4866C32.665 11.0928 33.3177 11.214 33.7034 11.8501C34.1484 12.5771 33.5254 13.5161 32.9913 14.122Z" fill="#8cb8f5"></path></svg>
            </a>

            <div class="d-flex">

                <a href="{{ route('file.show') }}" class="mx-2">
                    <i style="color: #8cb8f5" class="bi bi-file-earmark-text"></i>
                </a>

            </div>
        </div>
    </nav>

@yield('content')
@yield('script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<body>
</html>
