<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"  --}}
    {{--  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  --}}
    <title>Document</title>
</head>
<body>

    <div class="container">
        {{ $view_data->name }}
        {{--  <iframe height="400" width="400" src="/assets/{{ $view_data->file }}"></iframe>  --}}
    </div>

    <div class="ratio ratio-16x9">
        <iframe src="/assets/{{ $view_data->file }}" title="YouTube video" allowfullscreen></iframe>
    </div>
</body>
</html>

