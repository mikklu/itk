@extends('layouts.app')

@section('datatables')
    <link href="{{ asset('css/instructions.css')}}" rel="stylesheet">
@endsection

{{-- Käyttöohjeet kirjautuneelle -sivu --}}
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
                        <li><a href="#1.2_Uuden_idean_tallentaminen">1.2 Uuden idean tallentaminen</a></li>
                        <li><a href="#1.3_Idean_tiedot">1.3 Idean tiedot</a><li>
                        <li><a href="#1.4_Idean_muokkaaminen">1.4 Idean muokkaaminen</a></li>
                        <lI><a href="#1.5_Tiimijäsenen_lisääminen_ja_poistaminen">1.5 Tiimijäsenen lisääminen ja poistaminen</a></li>
                        <li><a href="#1.6_Idean_poistaminen">1.6 Idean poistaminen</a></li>
                    </ul>
                </li>
                <li><a href="#2_Yhteystiedot">2 Yhteystiedot</a>
                    <ul>
                        <li><a href="#2.1_Yhteystietojen_selaaminen">2.1 Yhteystietojen selaaminen</a></li>
                        <li><a href="#2.2_Uuden_yhteystiedon_tallentaminen">2.2 Uuden yhteystiedon tallentaminen</a></li>
                        <li><a href="#2.3_Yhteystiedon_tiedot">2.3 Yhteystiedon tiedot</a><li>
                        <li><a href="#2.4_Yhteystiedon_muokkaaminen">2.4 Yhteystiedon muokkaaminen</a></li>
                        <li><a href="#2.5_Yhteystiedon_poistaminen">2.5 Yhteystiedon poistaminen</a></li>
                    </ul>
                </li>
                <li><a href="#3_Asetukset">3 Asetukset</a>
                    <ul>
                        <li><a href="#3.1_Salasanan_vaihto">3.1 Salasanan vaihto</a></li>
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
            <p>Ideoiden selaaminen onnistuu heti kirjautumisen jälkeen avautuvalta Ideat-sivulta. Ideat-sivulle pääsee myös yläpalkista klikkaamalla "Ideat".</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.1.1.png') }}">
                <figcaption class="figure-caption">"Ideat" yläpalkissa</figcaption>
            </figure>
            <p>Ideoita voi järjestää saraketietojen perusteella klikkaamalla sarakkaiden yläpuolella olevia nuolia.</p>
            <p>Etsi-kenttään voi syöttää hakusanoja ja sopivat ideat suodattuvat nähtäväksi.</p>
            <p>Vasemmalta ylhäältä voi määrittää, montako ideaa yhdellä sivulla näkyy.</p>
            <p>Alhaalta oikealta löytyy sivunumerointi ja sivunvaihto, mikäli ideoita on enemmän kuin yhdellä sivulla on määritelty näytettäväksi.</p>
            <p>Klikkaamalla idean, tilaajan tai ohjaajan nimeä pääsee tarkastelemaan idean tai henkilö tarkempia tietoja.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.1.2.png') }}">
                <figcaption class="figure-caption">Ideat-sivun tärkeät toiminnot</figcaption>
            </figure>

            {{-- 1.2 Uuden idean tallentaminen --}}
            <h4 class="pb-3" id="1.2_Uuden_idean_tallentaminen">1.2 Uuden idean tallentaminen</h4>
            <p>Tallentaaksesi uuden idean paina "Lisää uusi idea" Ideat-sivun alareunasta.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.2.1.png') }}">
                <figcaption class="figure-caption">"Lisää uusi idea" Ideat-sivulla</figcaption>
            </figure>
            <p>Syötä ja valitse uuden idean tiedot lomakkeeseen. Idea tallentuu painamalla "Tallenna".</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.2.2.png') }}">
                <figcaption class="figure-caption">Lisää uusi idea -lomake ja Tallenna-painikkeen sijainti</figcaption>
            </figure>

            {{-- 1.3 Idean tiedot --}}
            <h4 class="pb-3" id="1.3_Idean_tiedot">1.3 Idean tiedot</h4>
            <p>Nähdäksesi idean tarkemmat tiedot, klikkaa idean nimeä Ideat-sivulla.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.3.1.png') }}">
                <figcaption class="figure-caption">Ideoiden nimet Ideat-sivulla</figcaption>
            </figure>
            <p>Idean tiimissä olevat jäsenet näkyvät muiden tietojen jälkeen Tiimijäsenet-otsikon alla.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.3.2.png') }}">
                <figcaption class="figure-caption">Näkymä yksittäisen idean tiedoista</figcaption>
            </figure>

            {{-- 1.4 Idean muokkaaminen --}}
            <h4 class="pb-3" id="1.4_Idean_muokkaaminen">1.4 Idean muokkaaminen</h4>
            <p>
                Ideaa pääsee muokkaamaan Ideat-sivulta klikkaamalla idean perässä olevaa Muokkaa-painiketta 
                tai yksittäisen idean tietoja tarkastellessa klikkaamalla Muokkaa-painiketta.
            </p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.4.1.png') }}">
                <figcaption class="figure-caption">Muokkaa painike Ideat-sivulla</figcaption>
            </figure>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.4.2.png') }}">
                <figcaption class="figure-caption">Muokkaa-painike idean tietoja tarkastellessa</figcaption>
            </figure>
            <p>
                Muokkaa haluamasi tiedot idealle ja paina "Tallenna" tallentaaksesi muokatut tiedot. 
                Muokkaa ideaa -sivun alaosassa voit hallita idean tiimijäseniä (ks. 1.5 Tiimijäsenen lisääminen ja poistaminen).
            </p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.4.3.png') }}">
                <figcaption class="figure-caption">Idean muokkaus -näkymä ja Tallenna-painike</figcaption>
            </figure>

            {{-- 1.5 Tiimijäsenen lisääminen ja poistaminen --}}
            <h4 class="pb-3" id="1.5_Tiimijäsenen_lisääminen_ja_poistaminen">1.5 Tiimijäsenen lisääminen ja poistaminen</h4>
            <p>Muokkaa ideaa -sivun (ks. 1.4 Idean muokkaaminen) alaosassa on lista tiimijäsenistä ja mahdollisuus lisätä sekä poistaa jäseniä.</p>
            <p>Voit lisätä jäsenen valitsemalla hänet pudotusvalikosta ja klikkaamalla "Lisää jäsen".</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.5.1.png') }}">
                <figcaption class="figure-caption">Lisää jäsen -painike</figcaption>
            </figure>
            <p>Voit poistaa jäsenen klikkaamalla "Poista" haluamasi jäsenen perästä.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.5.2.png') }}">
                <figcaption class="figure-caption">Poista-painike</figcaption>
            </figure>

            {{-- 1.6 Idean poistaminen --}}
            <h4 class="pb-3" id="1.6_Idean_poistaminen">1.6 Idean poistaminen</h4>
            <p>Idean voi poistaa painamalla Ideat-sivulla "Poista" halutun idean perästä.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.6.1.png') }}">
                <figcaption class="figure-caption">Poista-painikkeen sijainti</figcaption>
            </figure>
            <p>
                Poista-painike avaa varoitusikkunan, jossa kysytään haluatko varmasti poistaa ko. idean. 
                Paina "Poista idea" mikäli haluat poistaa idean ja "Peruuta" mikäli et ole varma tai tulit toisiin ajatuksiin.
            </p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/1.6.2.png') }}">
                <figcaption class="figure-caption">Varoitusikkuna</figcaption>
            </figure>

            {{-- 2 Yhteystiedot --}}
            <h3 class="py-3" id="2_Yhteystiedot">2 Yhteystiedot</h3>

            {{-- 2.1 Yhteystietojen selaaminen --}}
            <h4 class="pb-3" id="2.1_Yhteystietojen_selaaminen">2.1 Yhteystietojen selaaminen</h4>
            <p>Yhteystietojen selaaminen onnistuu yläpalkista klikkaamalla "Yhteystiedot".</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/2.1.1.png') }}">
                <figcaption class="figure-caption">"Yhteystiedot" yläpalkissa</figcaption>
            </figure>
            <p>Yhteystietoja voi järjestää saraketietojen perusteella klikkaamalla sarakkaiden yläpuolella olevia nuolia.</p>
            <p>Etsi-kenttään voi syöttää hakusanoja ja sopivat yhteystiedot suodattuvat nähtäväksi.</p>
            <p>Vasemmalta ylhäältä voi määrittää, montako yhteystietoa yhdellä sivulla näkyy.</p>
            <p>Alhaalta oikealta löytyy sivunumerointi ja sivunvaihto, mikäli yhteystietoja on enemmän kuin yhdellä sivulla on määritelty näytettäväksi.</p>
            <p>Klikkaamalla yhteystiedon nimeä pääsee tarkastelemaan tarkempia tietoja ko. yhteystiedosta.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/2.1.2.png') }}">
                <figcaption class="figure-caption">Yhteystiedot-sivun tärkeät toiminnot</figcaption>
            </figure>

            {{-- 2.2 Uuden yhteystiedon tallentaminen --}}
            <h4 class="pb-3" id="2.2_Uuden_yhteystiedon_tallentaminen">2.2 Uuden yhteystiedon tallentaminen</h4>
            <p>Tallentaaksesi uuden yhteystiedon paina "Lisää uusi yhteystieto" Yhteystiedot-sivun alareunasta.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/2.2.1.png') }}">
                <figcaption class="figure-caption">"Lisää uusi yhteystieto" Yhteystiedot-sivulla</figcaption>
            </figure>
            <p>Syötä ja valitse uuden yhteystiedon tiedot lomakkeeseen. Yhteystieto tallentuu painamalla "Tallenna".</p>
            <p>Tilaaja- ja Ohjaaja-valintaruudut on valittava, mikäli yhteystiedon haluaa asettaa tilaajaksi tai ohjaajaksi johonkin ideaan.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/2.2.2.png') }}">
                <figcaption class="figure-caption">Lisää uusi yhteystieto -lomake ja Tallenna-painikkeen sijainti</figcaption>
            </figure>

            {{-- 2.3 Yhteystiedon tiedot --}}
            <h4 class="pb-3" id="2.3_Yhteystiedon_tiedot">2.3 Yhteystiedon tiedot</h4>
            <p>Nähdäksesi yhteystiedon tarkemmat tiedot klikkaa yhteystiedon nimeä Yhteystiedot-sivulla.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/2.3.1.png') }}">
                <figcaption class="figure-caption">Yhteystietojen nimet Yhteystiedot-sivulla</figcaption>
            </figure>
            <p>Perustietojen jälkeen sivun alaosassa näkyy, missä ideoissa yhteystieto mahdollisesti on tilaajana, ohjaana ja tiimijäsenenä.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/2.3.2.png') }}">
                <figcaption class="figure-caption">Näkymä yksittäisen yhteystiedon tiedoista</figcaption>
            </figure>

            {{-- 2.4 Yhteystiedon muokkaaminen --}}
            <h4 class="pb-3" id="2.4_Yhteystiedon_muokkaaminen">2.4 Yhteystiedon muokkaaminen</h4>
            <p>
                Yhteystietoa pääsee muokkaamaan Yhteystiedot-sivulta klikkaamalla yhteystiedon perässä olevaa Muokkaa-painiketta 
                tai yksittäisen yhteystiedon tietoja tarkastellessa klikkaamalla Muokkaa-painiketta.
            </p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/2.4.1.png') }}">
                <figcaption class="figure-caption">Muokkaa painike Yhteystiedot-sivulla</figcaption>
            </figure>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/2.4.2.png') }}">
                <figcaption class="figure-caption">Muokkaa-painike Yhteystiedon tietoja tarkastellessa</figcaption>
            </figure>
            <p>Muokkaa haluamasi tiedot yhteystiedolle ja paina "Tallenna" tallentaaksesi muokatut tiedot.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/2.4.3.png') }}">
                <figcaption class="figure-caption">Yhteystiedon muokkaus -näkymä ja Tallenna-painike</figcaption>
            </figure>

            {{-- 2.5 Yhteystiedon poistaminen --}}
            <h4 class="pb-3" id="2.5_Yhteystiedon_poistaminen">2.5 Yhteystiedon poistaminen</h4>
            <p>Yhteystiedon voi poistaa painamalla Yhteystiedot-sivulla "Poista" halutun yhteystiedon perästä.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/2.5.1.png') }}">
                <figcaption class="figure-caption">Poista-painikkeen sijainti</figcaption>
            </figure>
            <p>
                Poista-painike avaa varoitusikkunan, jossa kysytään haluatko varmasti poistaa ko. yhteystiedon. 
                Paina "Poista yhteystieto" mikäli haluat poistaa yhteystiedon ja "Peruuta" mikäli et ole varma tai tulit toisiin ajatuksiin.
            </p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/2.5.2.png') }}">
                <figcaption class="figure-caption">Varoitusikkuna</figcaption>
            </figure>

            {{-- 3 Asetukset --}}
            <h3 class="py-3" id="3_Asetukset">3 Asetukset</h3>

            {{-- 3.1 Salasanan vaihto --}}
            <h4 class="pb-3" id="3.1_Salasanan_vaihto">3.1 Salasanan vaihto</h4>
            <p>Käyttäjän salasanan voi vaihtaa klikkaamalla yläpalkista käyttäjänimeä, jolloin salasanan vaihto avautuu.</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/3.1.1.png') }}">
                <figcaption class="figure-caption">Käyttäjänimi yläpalkissa</figcaption>
            </figure>
            <p>Salasanan voi vaihtaa syöttämällä ensin vanhan salasanan, jonka jälkeen syötetään kaksi kertaa uusi salasana. Uusi salasana tallentuu painamalla lopuksi "Tallenna".</p>
            <figure class="figure p-3">
                <img class="img-fluid shadow-sm border rounded" src="{{ asset('img/instructions/auth/3.1.2.png') }}">
                <figcaption class="figure-caption">Vaihda salasana -näkymä ja Tallenna-painike</figcaption>
            </figure>
            <p>Mikäli salasana unohtuu, ota yhteyttä admin-käyttäjään.</p>

        </div>

    </div>
@endsection