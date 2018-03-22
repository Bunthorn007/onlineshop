@extends('./layouts/app')

@section('header')
    <title>Post Product</title>
    <link rel="stylesheet" href="{{asset('css/signup-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">
@endsection

@section('content')
    <div class="signup">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="icon icon-pencil-square-o" style="color:#d9230f"></span>
                <span class="d-ib">Create Post</span>
            </h1>
        </div>

        <div class="signup-body">
            <form id="addImages" action="{{url('/upload')}}" method="post" enctype="multipart/form-data" class="dropzone">
                {{csrf_field()}}

            </form>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{asset('js/dropzone.min.js')}}"></script>
@endsection