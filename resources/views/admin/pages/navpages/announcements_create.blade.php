{{--@extends('layouts.appindexpage')--}}

{{--@section('content')--}}
{{--    <h3>Δημιουργία Ανακοίνωσης</h3>--}}
{{--    {!! Form::open(['action' => 'AnnouncementsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}--}}
{{--        <div class="form-group">--}}
{{--            {{Form::label('title', 'Τίτλος')}}--}}
{{--            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            {{Form::label('body', 'Κείμενο')}}--}}
{{--            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'name' => 'content' , 'class' => 'form-control',  'placeholder' => 'Body Text'])}}--}}
{{--        </div>--}}
{{--    ~~~~~~~~~~~~~~~~ IMAGE ~~~~~~~~~~~~~~~~~~~~~~~~~--}}
{{--        <div class="form-group">--}}
{{--        {{Form::file('cover_image')}} <!-- koubi na anevaseis arxeio -->--}}
{{--        </div>--}}
{{--    --}}
{{--        {{Form::submit('Ολοκλήρωση', ['class'=>'btn btn-primary'])}}--}}
{{--        {!! Form::close() !!}--}}

{{--@endsection--}}

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel</title>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/home') }}"> Dashboard </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Αποσύνδεση') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Δημιουργία Ανακοίνωσης</div>
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form action="{{ action('AnnouncementsController@store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Τίτλος:</label>
                                <input name="title" type="text" placeholder='Τίτλος' class="form-control">
                                <br>
                                <div class="form-group">
{{--                                    <textarea name="content" class="form-control">{{ $data->content }}</textarea><br>--}}
                                    <textarea name="content" class="form-control"></textarea><br>
                                    <button type="submit" class="btn btn-success">Ολοκλήρωση</button>
                                    <a href="{{ url('/announcements') }}" class="btn btn-danger pull-right" style="float: right">Πίσω</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>
