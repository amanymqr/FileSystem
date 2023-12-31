@extends('file.master')
@section('title', 'share link')
@section('content')
    <div class="container "  style=" margin-top: 90px">
        <h2 style="color: #617fa9 ;" class="text-center fw-bold fs-5">{{ $file->name }} Shareable Link</h2>
        <div class="row  d-flex justify-content-center align-items-center">

            <div class="col-md-10"  >
                <small class="fw-bold" style="color: #4b4949" >copy link and share it to download file :</smallv>
                <div class="copy-box border rounded p-3 d-flex justify-content-between align-items-center w-100">
                    <div class="box-content">
                        <small class="fw-bold" >{{ $url }}</small>
                    </div>
                    <button class="copy-button btn text-white " style="background-color: #617fa9" onclick="copyText()"><i class="bi bi-clipboard"></i></button>
                </div>

            </div>
        </div>
    </div>

@section('script')
    <script>
        function copyText() {
            const boxContent = document.querySelector('.box-content');
            const text = boxContent.textContent;

            // Create a temporary textarea to copy the text to clipboard
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);

            // Update the button content to indicate successful copy with the copy icon
            const copyButton = document.querySelector('.copy-button');
            copyButton.innerHTML = '<i class="bi bi-clipboard-check"></i>';

            // Reset button content after 2 seconds
            setTimeout(() => {
                copyButton.innerHTML = '<i class="bi bi-clipboard"></i>';
            }, 2000);
        }

    </script>

@endsection
@endsection
