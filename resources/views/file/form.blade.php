@extends('file.master')
@section('content')

<body style="background-color: #ebebeb">

    <div class="upload ">
        <div class="container ">
            <h1 class=" text-center fw-bold fs-5 pt-5" style="color:#445963 ">File Sharing System</h1>
            <div class="img-upload mb-4  d-flex justify-content-center align-items-center ">
                <img style="width: 30%" src="{{ asset('img/upload.png') }}" alt="">
            </div>



            <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <div class="mb-3">
                        <input class="form-control @error('name')is-invalid @enderror " type="text" name="name"
                            placeholder="File Name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                <div >
                    <label style="color:#445963 ">Upload File You Wanna Share </label>
                    <input class="form-control @error('file')is-invalid @enderror" type="file" name="file">
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

</body>

@endsection
