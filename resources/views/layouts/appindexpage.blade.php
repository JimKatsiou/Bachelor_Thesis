<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="Saquib" content="Blade">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ERASMUS') }}</title>

        <!-- Styles -->
        <!-- load bootstrap from a cdn -->
        <link href="{{ asset('css/app.css')}}" rel="stylesheet"  >


        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>


    </head>

    <body>

    <img src="/storage/cover_images/Erasmus_firstpage.jpg" alt="photo" width="40%" >

    <div id="app" >

        @include('inc.navbar')

        <div class="py-4 container">

            @include('partials.alerts')
            @yield('inc.messages')

            @yield('content')


        </div>
        @include('inc.footer')
    </div>

    <!-- Scripts -->



    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

    </body>

</html>
