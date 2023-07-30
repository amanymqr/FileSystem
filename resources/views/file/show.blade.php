@extends('file.master')
@section('title', 'uploaded fils')
@section('content')


    <div class="container my-5">
        @if (session('msg'))
        <div class="container">
            <div class="alert mt-4 alert-{{ session('type') }}" id="flash-msg">
                {{ session('msg') }}
            </div>
        </div>
        @endif

        <h2 class="text-center" style="color: #617fa9">Uploaded Files</h2>
        <table class="table text-center table-striped table-sm">

            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($file_data as $data)
                <tr>
                    <td class="align-middle">{{ $data->name }}</td>
                    <td class="align-middle ">
                        <a class="btn btn-sm btn-primary" href="{{ route('file.download', $data->file) }}">
                            <i class="bi bi-file-earmark-arrow-down"></i>
                        </a>
                        <a class="btn btn-sm btn-success" href="{{ route('file.share', $data->id) }}"><i class="bi bi-share"></i></a>


                        <form class="d-inline-block  mt-2" action="{{ route('file.destroy', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                        {{--  <a class="btn btn-sm btn-secondary" href="{{ route('file.edit', $data->id) }}"><i class="bi bi-pencil-square text-white"></i></a>  --}}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
