@extends('layouts.app')

@section('datatables')
    <link href="{{ asset('css/instructions.css')}}" rel="stylesheet">
@endsection

{{-- Käyttöohjeet -sivu --}}
@section('content')
    <div class="container col-lg-5 py-3 mb-3 shadow rounded-bottom bg-white">

        {{-- Otsikko --}}
        <h2 class="pb-3">Käyttöohjeet</h2>

        {{-- Sisällysluettelo --}}
        <div id="toc_container" class="p-3 mb-3 bg-light rounded shadow-sm border">
            <p class="fw-bold">Sisällys</p>
            <ul class="container">
                <li><a href="#1_Käyttäjät">1 Käyttäjät</a>
                    <ul>
                        <li><a href="#1.1_Käyttäjien_selaaminen">1.1 Käyttäjien selaaminen</a></li>
                        <li><a href="#1.2_Uuden_käyttäjän_lisääminen">1.2 Uuden käyttäjän lisääminen</a></li>
                        <li><a href="#1.3_Käyttäjän_poistaminen">1.3 Käyttäjän poistaminen</a></li>
                    </ul>
                </li>
                <li><a href="#2_Asetukset">2 Asetukset</a>
                    <ul>
                        <li><a href="#2.1_Salasanan_vaihto">2.1 Salasanan vaihto</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        {{-- Käyttöohjeet --}}
        <div>

            {{-- 1 Käyttäjät --}}
            <h3 class="py-3" id="1_Käyttäjät">1 Käyttäjät</h3>

            {{-- 1.1 Käyttäjien selaaminen --}}
            <h4 class="pb-3" id="1.1_Käyttäjien_selaaminen">1.1 Käyttäjien selaaminen</h4>
            <p>Käyttäjien selaaminen onnistuu heti kirjautumisen jälkeen avautuvalta Käyttäjät-sivulta. Käyttäjät-sivulle pääsee myös yläpalkista klikkaamalla "Käyttäjät".</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/admin/1.1.1.png') }}">
                <figcaption class="figure-caption">"Käyttäjät" yläpalkissa</figcaption>
            </figure>
            <p>Käyttäjät voi järjestää nimen perusteella klikkaamalla Nimi-sarakkeen yläpuolella olevia nuolia.</p>
            <p>Etsi-kenttään voi syöttää hakusanoja ja sopivat käyttäjät suodattuvat nähtäväksi.</p>
            <p>Vasemmalta ylhäältä voi määrittää, montako käyttäjää yhdellä sivulla näkyy.</p>
            <p>Alhaalta oikealta löytyy sivunumerointi ja sivunvaihto, mikäli käyttäjiä on enemmän kuin yhdellä sivulla on määritelty näytettäväksi.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/admin/1.1.2.png') }}">
                <figcaption class="figure-caption">Käyttäjät-sivun tärkeät toiminnot</figcaption>
            </figure>

            {{-- 1.2 Uuden käyttäjän lisääminen --}}
            <h4 class="pb-3" id="1.2_Uuden_käyttäjän_lisääminen">1.2 Uuden käyttäjän lisääminen</h4>
            <p>Lisätäksesi uuden käyttäjän paina "Lisää uusi käyttäjä" Käyttäjät-sivun alareunasta.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/admin/1.2.1.png') }}">
                <figcaption class="figure-caption">"Lisää uusi käyttäjä" Käyttäjät-sivulla</figcaption>
            </figure>
            <p>Syötä uudelle käyttäjälle käyttäjänimi ja salasana kaksi kertaa lomakkeeseen. Käyttäjä tallentuu painamalla "Tallenna".</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/admin/1.2.2.png') }}">
                <figcaption class="figure-caption">Lisää uusi käyttäjä -lomake ja Tallenna-painikkeen sijainti</figcaption>
            </figure>

            {{-- 1.3 Käyttäjän poistaminen --}}
            <h4 class="pb-3" id="1.3_Käyttäjän_poistaminen">1.3 Käyttäjän poistaminen</h4>
            <p>Käyttäjän voi poistaa painamalla Käyttäjät-sivulla "Poista" halutun käyttäjän perästä.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/admin/1.3.1.png') }}">
                <figcaption class="figure-caption">Poista-painikkeen sijainti</figcaption>
            </figure>
            <p>
                Poista-painike avaa varoitusikkunan, jossa kysytään haluatko varmasti poistaa ko. käyttäjän. 
                Paina "Poista käyttäjä" mikäli haluat poistaa käyttäjän ja "Peruuta" mikäli et ole varma tai tulit toisiin ajatuksiin.
            </p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/admin/1.3.2.png') }}">
                <figcaption class="figure-caption">Varoitusikkuna</figcaption>
            </figure>

            {{-- 2 Asetukset --}}
            <h3 class="py-3" id="2_Asetukset">2 Asetukset</h3>

            {{-- 2.1 Salasanan vaihto --}}
            <h4 class="pb-3" id="2.1_Salasanan_vaihto">2.1 Salasanan vaihto</h4>
            <p>Käyttäjän salasanan voi vaihtaa klikkaamalla yläpalkista käyttäjänimeä, jolloin salasanan vaihto avautuu.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/admin/2.1.1.png') }}">
                <figcaption class="figure-caption">Käyttäjänimi yläpalkissa</figcaption>
            </figure>
            <p>Salasanan voi vaihtaa syöttämällä ensin vanhan salasanan, jonka jälkeen syötetään kaksi kertaa uusi salasana. Uusi salasana tallentuu painamalla lopuksi "Tallenna".</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/admin/2.1.2.png') }}">
                <figcaption class="figure-caption">Vaihda salasana -näkymä ja Tallenna-painike</figcaption>
            </figure>

        </div>

    </div>
@endsection