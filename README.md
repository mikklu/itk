<p align="center"><img src="https://raw.githubusercontent.com/mikklu/ideatietokanta/main/public/img/logo.png?token=ARJA4YR6YVFF6T3XOEOFPFTAKL5XS"></p>

## Tietoa Ideatietokannasta

Ideatietokanta on Jokilaaksojen koulutuskuntayhtymälle JEDUlle kehitetty selainpohjainen tietokantasovellus ensisijaisesti tieto- ja viestintätekniikan sekä liiketalouden opettajien käyttöön projekti-ideoiden tallentamiseksi.

Ideatietokanta on toteutettu käyttäen mm. seuraavia ohjelmakehyksiä:

- [Laravel 8](https://laravel.com/)
- [Bootstrap 5](https://getbootstrap.com/)
- [jQuery](https://laravel.com/docs/container)
- [DataTables](https://datatables.net/)

## Ideatietokannan asennus
### Palvelimen vaatimukset

Laravel 8 -ohjelmakehys vaatii palvelimelta seuraavia ohjelmistoja:

- PHP >= 7.3
- BCMath PHP-lisäosa
- Ctype PHP-lisäosa
- Fileinfo PHP-lisäosa
- JSON PHP-lisäosa
- Mbstring PHP-lisäosa
- OpenSSL PHP-lisäosa
- PDO PHP-lisäosa
- Tokenizer PHP-lisäosa
- XML PHP-lisäosa

Käytämme tässä ohjeessa [Composer-paketinhallintaa](https://getcomposer.org/) riippuvuuksien asentamiseen.

### Asentaminen

Tarvitset SSH-yhteyden palvelimen komentoriville ajaaksesi ohjeen komentoja.

Laravel suosittelee Laravel-ohjelmia käytettävän aina palvelimen "web-hakemiston" juurihakemistosta. Asentaminen alihakemistoon voi altistaa arkaluontoisia tiedostoja tunkeutujille.

Voit kloonata ohjelman githubista komennolla `git clone https://github.com/mikklu/ideatietokanta.git .`. Piste komennon perässä jättää projektikansion pois ja lataa projektitiedostot suoraan kohdehakemistoon. Huomaa, että tämä toimii vain tyhjään hakemistoon.

Voit myös ladata tiedostot esim. zip-pakettina ja purkaa ne kohdehakemistoon.

Kopioi seuraavaksi Laravel-ohjelman asetustiedosto komennolla `cp .env-example .env`. Aukaise `.env`-tiedosto haluamallasi tekstieditorilla ja etsi seuraava osio:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
```
Vaihda seuraavat arvot:
```
APP_NAME=Ideatietokanta
APP_ENV=production
APP_KEY=
APP_DEBUG=false
```
Vaihda `APP_URL` arvoksi url-osoite johon ohjelma sijoittuu.

Ideatietokanta tarvitsee tyhjän tietokannan tietojen tallentamiseen. Ohjelmaa on testattu vain MySQL-tietokannalla, mutta se toiminee myös muilla tietokantatyypeillä. Etsi seuraava osio:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
Syötä arvoiksi tietokantasi tiedot. Tallenna tiedosto.

Asenna projektin riippuvuudet komennolla `composer install`.

Luo seuraavaksi `.env`-tiedostoon `APP_KEY`-arvo komennolla `php artisan key:generate`. Tätä avainta käytetään mm. evästeiden salaamiseen.

Lopuksi pitää ajaa tietokantamigraatiot komennolla `php artisan migrate`. Ohjelma luo tietokantaan tarvittavat taulut.

Ohjelma on valmis käytettäväksi. Kysy apua palvelimen ylläpitäjältä, mikäli ohjeiden kaltainen asennus ei onnistu. Admin-käyttäjän ensiasennustunnukset ovat:
```
Käyttäjänimi: admin
Salasana: admin1234
```
Vaihda salasana heti!
