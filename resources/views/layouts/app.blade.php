<!doctype html>
<html lang="en">
  <head>
    {{-- Vaaditut metatagit --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Bootstrap CSS 5.0.0 beta2 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    {{-- DataTables-integraatio taulukkosivuille --}}
    @yield('datatables')

    {{-- Ikonit --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">

    <title>Ideatietokanta</title>
</head>
<body style="background-color: #dfebf7">

    {{-- Navigointipalkki --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-xl">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/bulb-xsm.png')}}" class="d-inline-block align-top">
                Ideatietokanta
            </a>

            {{-- Responsiivinen navigointipalkki --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            
                {{-- Vasemmalle sijoittuvat navilinkit --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">                  
                
                    {{-- Ideat-osio piilotetaan adminilta --}}
                    @if(!isset(auth()->user()->is_admin) || auth()->user()->is_admin !== 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ideas') }}">Ideat</a>
                        </li>

                        {{-- Yhteystiedot-osio piilotetaan vierailta ja adminilta --}}
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contacts') }}">Yhteystiedot</a>
                            </li>
                        @endauth

                    @endif

                    {{-- Käyttäjät-osio näytetään vain adminille --}}
                    @auth
                        @if(auth()->user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users') }}">Käyttäjät</a>
                            </li>
                        @endif
                    @endauth
                </ul>

                {{-- Oikealle sijoittuvat navilinkit --}}
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    {{-- Näkyy kaikille --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('instructions') }}">Käyttöohjeet</a>
                    </li>

                    {{-- Näkyy vain kirjautuneille --}}
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings') }}">{{ auth()->user()->username }}</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn nav-link" type="submit">Kirjaudu ulos</button>
                            </form>
                        </li>
                    @endauth

                    {{-- Näkyy vain vieraille --}}
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Kirjaudu sisään</a>
                        </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="container-xl">
        <p class="text-center text-muted fw-light" style="font-size:0.7em">Ideatietokannan toteutus: Mikko Luttinen, 2021<p>
    </div>

    {{-- Popper.js ja Bootstrap JavaScript plugins --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    
</body>
</html>