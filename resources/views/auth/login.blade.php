<!doctype html>
<html lang="en">
  <head>
    {{-- Required meta tags --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Bootstrap CSS 5.0.0 beta --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <link href="{{ asset('css/login.css')}}" rel="stylesheet">

    {{-- Ikonit --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">

    <title>Ideatietokanta</title>
</head>

{{-- Sisäänkirjautumissivu --}}
<body class="text-center">
    <main class="form-login bg-white rounded shadow">

            {{-- Sisäänkirjautumislomake --}}
            <form action="{{ route('login') }}" method="post">
                @csrf
                <img class="mb-4" src="{{ asset('img/bulb-sm.png') }}">
                <h1 class="h3 mb-3 fw-normal">Kirjaudu sisään</h1>

                {{-- Käyttäjänimen syöttökenttä --}}
                <div class="form-floating mb-3">
                    <input type="text" name="username" id="username" placeholder="Käyttäjänimi"
                    class="form-control @error('username') is-invalid @enderror @if (session('status')) is-invalid @endif"
                    value="{{ old('username', session('username')) }}" autofocus="">
                    <label for="username">Käyttäjänimi</label>
                    {{-- Virhetekstit --}}
                    @error('username')
                        <div class="invalid-feedback">
                            {{  $message }}
                        </div>
                    @enderror
                    @if (session('status'))
                        <div class="invalid-feedback">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                {{-- Salasanan syöttökenttä --}}
                <div class="form-floating mb-3">
                    <input type="password" name="password" id="password" placeholder="Salasana"
                    class="form-control @error('password') is-invalid @enderror @if (session('status')) is-invalid @endif">
                    <label for="password">Salasana</label>
                    {{-- Virheteksti --}}
                    @error('password')
                        <div class="invalid-feedback">
                            {{  $message }}
                        </div>
                    @enderror
                </div>

                {{-- Muista minut -valintaruutu --}}
                <div class="checkbox mb-3">
                    <label>
                        <input class="checkbox" type="checkbox" name="remember" id="remember">
                        Muista minut
                    </label>
                </div>

                {{-- Kirjaudu sisään -painike --}}
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Kirjaudu sisään</button>
                </div>

                {{-- Linkki opiskelijoille kirjautumattomaan käyttöön --}}
                <div>
                    <a href="{{ route('ideas') }}">Olen JEDUn opiskelija</a>
                </div>

            </form>
        </div>
    </main>

    {{-- Popper.js ja Bootstrap JavaScript plugins --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</body>
</html>