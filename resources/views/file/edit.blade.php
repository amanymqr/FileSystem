@extends('file.master')
@section('title', 'Edit File')
@section('content')

<div class="upload" style="margin-top: 90px">
    <div class="container">
        <div class="form">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5">
                    <div class="img-upload mb-4 d-flex justify-content-center align-items-center">
                        <img class="img-fluid" src="{{ asset('img/upload.png') }}" alt="">
                    </div>
                </div>


                <div class="col-md-6">
                    <h4 class="text-center mb-4" style="color:#445963">Edit File</h4>


                    <form action="{{ route('file.update', ['id' => $file_data->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label style="color:#445963" for="name">file name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                id="name" placeholder="File Name" value="{{ $file_data->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        @if($file_data->file)
                        <div class="mb-3">
                            <label style="color:#445963">current file</label>
                            <input class="form-control" type="text" value="{{ $file_data->file }}" readonly>
                        </div>
                        @endif

                        <div>
                            <label style="color:#445963">edit file by uploading new</label>
                            <input class="form-control @error('new_file') is-invalid @enderror" type="file" name="new_file">
                            @error('new_file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button class="btn mt-3 w-100" style="background-color: #ba68c8; color: #fff" type="submit">Update
                            File</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
