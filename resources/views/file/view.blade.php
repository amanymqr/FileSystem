@extends('file.master')
@section('content')
<body>

    <div class="container">
        {{ $view_data->name }}
        <iframe height="600" width="600" src="/assets/{{ $view_data->file }}"></iframe>
    </div>


</body>
</html>
@stop
