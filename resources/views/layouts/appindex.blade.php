<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="Saquib" content="Blade">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ERASMUS') }}</title>

        <!-- Styles -->
        <!-- load bootstrap from a cdn -->
        <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
        <link href="{{ asset('css/app.css')}}" rel="stylesheet"  >


        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    </head>

    <body>

        <img src="storage/cover_images/Erasmus_firstpage.jpg" alt="photo" width="40%" >

        <div id="app" >

            @include('inc.navbar')

            <div class="py-4 container" >

                <div>
                    @include('partials.alerts')
                    @yield('inc.messages')
                </div>
{{--                @include('inc.homepageimages')--}}
{{--                @yield('homepageimages')--}}


                @yield('content')
                <hr>

                @include('inc.section')
                @yield('section')
            </div>

        </div>
            @include('inc.footer')
        <!-- Scripts -->
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="https:///maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https:///cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery first, then Bootstrap JS. -->
{{--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
{{--        <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>--}}

        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>

    </body>

</html>
