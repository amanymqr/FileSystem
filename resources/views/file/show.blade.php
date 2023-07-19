<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>uploads</title>
</head>
@if (session('msg'))
<div class="container">
    <div class="alert mt-4 alert-{{ session('type') }}" id="flash-msg">
        {{ session('msg') }}
    </div>
</div>

@endif
<body style="background-color: #ebebeb">

    <div class="container my-5">

    <h2 class="text-center">Uploaded Files</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">File</th>
                    <th scope="col">Download</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($file_data as $data )
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->file }}</td>
                    <td>
                        <a href="{{ route('file.download' , $data->file) }}">
                            <i class="bi bi-download"></i>
                        </a></td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
