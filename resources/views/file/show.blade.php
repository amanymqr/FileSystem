@extends('file.master')
@section('content')


    <body>

        <div class="container my-5 ">

            <h2 class="text-center">Uploaded Files</h2>
            <table class="table text-center  ">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        {{--  <th scope="col">Download</th>
                        <th scope="col">share</th>  --}}
                        <th scope="col">action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($file_data as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('file.download', $data->file) }}">
                                    <i class="bi bi-file-earmark-arrow-down"></i>
                                </a>

                                <a class="btn btn-primary" href="{{ route('file.share', $data->id) }}"><i class="bi bi-share"></i></a>

                                {{--  <a class="btn btn-danger" href="{{ route('file.view', $data->id) }}"><i class="bi bi-archive"></i></a>  --}}

{{--
                                <form action="{{ route('file.destroy',  $data->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>  --}}

                                <form class="d-inline-block" action="{{ route('file.destroy', ['id' => $data->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE') <!-- Ensure the form method is set to DELETE -->
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>



        </div>



    </body>
