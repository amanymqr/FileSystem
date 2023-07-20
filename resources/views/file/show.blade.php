@extends('file.master')
@section('content')

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
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        {{--  <th scope="col">File</th>  --}}
                        <th scope="col">Download</th>
                        {{--  <th scope="col">Delete</th>  --}}

                    </tr>
                </thead>
                <tbody>
                    @foreach ($file_data as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            {{--  <td>{{ $data->file }}</td>  --}}
                            <td>
                                <a href="{{ route('file.download', $data->file) }}">
                                    <i class="bi bi-download"></i>
                                    {{ $data->file }}
                                </a>
                            </td>

                            {{--  {{ $data->name }}
                    <a href="{{ route('file.download', $data) }}" download>Download</a>  --}}

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </body>
