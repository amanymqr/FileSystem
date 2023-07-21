@extends('file.master')
@section('title', 'form')
@section('content')



        <div class="upload" style="margin-top: 90px">
            <div class="container ">
                <div class="form ">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-5 ">
                            <div class=" img-upload mb-4  d-flex justify-content-center align-items-center ">
                                <img class="img-fluid" src="{{ asset('img/upload.png') }}" alt="">
                            </div>

                        </div>
                        <div class="col-md-6 ">
                            <h4 class="text-center mb-4" style="color:#445963 ">File Sharing System</h4>
                            <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="mb-3">
                                        <label style="color:#445963 " for="name">File Name</label>
                                        <input class="form-control @error('name')is-invalid @enderror " type="text"
                                            name="name" id="name" placeholder="File Name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div>
                                        <label style="color:#445963 ">Upload File You Wanna Share </label>
                                        <input class="form-control @error('file')is-invalid @enderror" type="file"
                                            name="file">
                                        @error('file')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <button class="btn mt-3 w-100" style="background-color: #ba68c8 ; color:#fff"
                                        type="submit">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>




            </div>

        </div>

@endsection
