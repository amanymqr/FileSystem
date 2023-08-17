@extends('file.master')
@section('title', 'form')

@section('content')

    <div class="upload" style="margin-top: 70px">
        <div class="container">

            <div class="row align-items-center justify-content-around">
                <div class="col-md-9">
                    <p class="text-center text-secondary">
                        You Can Share Files With Friends By Uploading it then Share Link to Download!
                        </p>
                    <div class="card shadow border-0">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="w-50">
                                <img class="img-fluid" src="{{ asset('img/download.jpg') }}" alt="File Upload">
                            </div>


                            <div class="w-50 pl-3" >
                                <h4 class="text-center fw-bold mb-4" style="color:#617fa9">File Sharing System</h4>
                                <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label style="color:#445963" for="name">File Name</label>
                                        <input class="form-control @error('name')is-invalid @enderror" type="text"
                                            name="name" id="name" placeholder="File Name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label style="color:#445963">Upload File You Wanna Share</label>
                                        <input class="form-control @error('file')is-invalid @enderror" type="file"
                                            name="file">
                                        @error('file')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <button class="btn mt-3 w-100 text-white" style="background-color: #617fa9"
                                        type="submit">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
