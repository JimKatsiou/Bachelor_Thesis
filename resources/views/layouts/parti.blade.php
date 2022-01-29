<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'ERASMUS') }}</title>

        <link href="{{ asset('css/app.css')}}" rel="stylesheet">
        <link href="{{ asset('/css/participation.css') }}" rel="stylesheet">

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    </head>
<body>

    <div class="app">
    
     
    
        <div class="py-4 container">

            @yield('content')
        
        </div>
 
</body>
</html>