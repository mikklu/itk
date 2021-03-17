@extends('layouts.app')

@section('datatables')
    <link href="{{ asset('css/instructions.css')}}" rel="stylesheet">
@endsection

{{-- Käyttöohjeet kirjautumattomalle -sivu --}}
@section('content')
    <div class="container col-lg-5 py-3 mb-3 shadow rounded-bottom bg-white">

        {{-- Otsikko --}}
        <h2 class="pb-3">Käyttöohjeet</h2>

        {{-- Sisällysluettelo --}}
        <div id="toc_container" class="p-3 mb-3 bg-light rounded shadow-sm border">
            <p class="fw-bold">Sisällys</p>
            <ul class="container">
                <li><a href="#1_Ideat">1 Ideat</a>
                    <ul>
                        <li><a href="#1.1_Ideoiden_selaaminen">1.1 Ideoiden selaaminen</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        {{-- Käyttöohjeet --}}
        <div>

            {{-- 1 Ideat --}}
            <h3 class="py-3" id="1_Ideat">1 Ideat</h3>

            {{-- 1.1 Ideoiden selaaminen --}}
            <h4 class="pb-3" id="1.1_Ideoiden_selaaminen">1.1 Ideoiden selaaminen</h4>
            <p>Ideoiden selaaminen onnistuu heti ensimmäisenä avautuvalta Ideat-sivulta. Ideat-sivulle pääsee myös yläpalkista klikkaamalla "Ideat".</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/unauth/1.1.1.png') }}">
                <figcaption class="figure-caption">"Ideat" yläpalkissa</figcaption>
            </figure>
            <p>Ideoita voi järjestää saraketietojen perusteella klikkaamalla sarakkaiden yläpuolella olevia nuolia.</p>
            <p>Etsi-kenttään voi syöttää hakusanoja ja sopivat ideat suodattuvat nähtäväksi.</p>
            <p>Vasemmalta ylhäältä voi määrittää, montako ideaa yhdellä sivulla näkyy.</p>
            <p>Alhaalta oikealta löytyy sivunumerointi ja sivunvaihto, mikäli ideoita on enemmän kuin yhdellä sivulla on määritelty näytettäväksi.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/unauth/1.1.2.png') }}">
                <figcaption class="figure-caption">Ideat-sivun tärkeät toiminnot</figcaption>
            </figure>

        </div>

    </div>
@endsection