{{--@extends('layouts.appindexpage')--}}

{{--@section('content')--}}
{{--    <h1>Επεξεργασία Ανακοίνωσης</h1>--}}
{{--    @foreach($announcements as $announcement)--}}
{{--    {!! Form::open(['action' => ['AnnouncementsController@update', $announcement->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}--}}
{{--    <div class="form-group">--}}
{{--        {{Form::label('title', 'Title')}}--}}
{{--        {{Form::text('title', $announcement->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        {{Form::label('body', 'Body')}}--}}
{{--        {{Form::textarea('body', $announcement->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}--}}
{{--    </div>--}}
{{--    <div class="form-group">--}}
{{--        {{Form::file('cover_image')}}--}}
{{--    </div>--}}
{{--    {{Form::hidden('_method','PUT')}}--}}
{{--    {{Form::submit('Ολοκλήρωση', ['class'=>'btn btn-primary'])}}--}}
{{--    {!! Form::close() !!}--}}
{{--    @endforeach--}}
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
                <div class="card-header">Edit Page</div>
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                        @foreach($announcements as $announcement)
                            <form action="{{ action('AnnouncementsController@update',$announcement->id ) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Τίτλος:</label>
                                        <input name="title" type="text" placeholder='Τίτλος' value="{{$announcement->title}}"class="form-control">
                                        <br>
                                        <div class="form-group">
                                            <textarea name="content" class="form-control">{{ $announcement->body }}</textarea><br>
                                            <button type="submit" class="btn btn-success">Ολοκλήρωση</button>
                                            <a href="{{ url('/announcements') }}" class="btn btn-danger pull-right" style="float: right">Πίσω</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
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
