<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark shadow-lg">
    <div class="container">

{{--        <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--            {{ config('app.name', 'ERASMUS') }}--}}
{{--        </a>--}}

        <ul class="navbar-nav mr-auto">

            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">ΑΡΧΙΚΗ ΣΕΛΙΔΑ</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/announcements') }}">ΑΝΑΚΟΙΝΩΣΕΙΣ</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/links') }}">ΧΡΗΣΙΜΟΙ ΣΥΝΔΕΣΜΟΙ</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">ΕΠΙΚΟΙΝΩΝΙΑ</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="/services">Services</a></li> -->
            <li class="nav-item"><a class="nav-link" href="{{ url('/erasmuseclass') }}">ERASMUS e-class</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/experiences') }}">ΕΜΠΕΙΡΙΕΣ ΦΟΙΤΗΤΩΝ</a></li>

        </ul>

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
                        <a octicon="sign-in" class="nav-link" href="{{ route('login') }}">{{ __('Σύνδεση') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Εγγραφή') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->surname}}
                            @if(Auth::user()->role == 0)
                                (Admin)
                            @elseif(Auth::user()->role == 1)
                                (Καθηγητής)
                            @else((Auth::user()->role == 2))
                                (Φοιτητής)
                            @endif
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/home') }}">Dashboard </a>
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
