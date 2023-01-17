## __16. januar 2023.__ - dan feraktorisanja
> ## __PROMENJENA STRUKTURA FAJLOVA I FOLDERA U [PHP-PDS/SKELETON STANDARD](https://github.com/php-pds/skeleton_research)__

### resources/polovni.sql
- Dodata aktuelna baza

### *.php:
- Promenjeni nazivi fajlova i klasa da prate [standardnu php nomenklaturu](https://codeigniter.com/userguide3/general/styleguide.html#file-naming)
- Promenjeni nazivi funkcija da prate [standardnu php nomenklaturu](https://codeigniter.com/userguide3/general/styleguide.html#class-and-method-naming)

### Database_operacije.php:
- Promene refaktorisanja (klasa je postala prevelika i krsi single responsibility princip)
- Uklonjena funkcija test()
- Dodati opisi svih funkcija

### test.php:
- Dodat test u sklopu fajla, umesto u klasi Database_operacije

### logovi
- logovi su prebaceni u CHANGELOG.md, doradjen markdown

### README
- Dodat README.md sa osnovnim informacijama

### TODO
- Popravi sve pokvareno usled izmene
- Upotrebi builder pattern za pravljenje Oglasa
- Upotrebi Chain of Responsibility pattern za pretragu oglasa
- Upotrebi Chain of Responsibility pattern za login i register sanitizaciju inputa + login

## __12. januar 2023.__

### login.php:
- izmenjen naziv iz login.html u login.php
- izmenjen div logina u formu
- izmenjeno input dugme iz type='button' u type='submit' da bi radilo sa formom
- ako si ulogovan logoutuje
- dodat login, input sanitizacija
- sav content prebacen u sekciju, "Polovnjaci" tekst izmenjen u h1 "Prijavi se" zbog SEO
- title izmenjen u Polovnjaci - Prijava
- dodat link na register za korisnike koji nemaju nalog

### register.php:
- izmenjen naziv iz register.html u register.php
- iskopiran kod login.php
- napravljena registracija
- full provera i sanitizacija svih inputa regexom 

### config.php:
- dodat fajl za ostatak konfiguracije (bcrypt cost u bazi)

### db.php:
- funkcija get_korisnik_po_username(username)
- funkcija izmeni_lozinku(id, novalozinka)
- funkcija proveri_kredencijale(username, lozinka)
- funckija get_korisnik_po_mail(mail)
- funkcija napravi_nalog(...)
- sve lozinke izmenjene u hesirane lozinke

### automobili.php:
- izmenjen naziv iz automobili.html u automobili.php

### index.php:
- ako je korisnik ulogovan umesto "Prijavi se" pise "Odjavi se"
- ako je korisnik ulogovan uklanja se "Registruj se" opcija
- ako je korisnik ulogovan "Postavi oglas" vodi na automobili.php
- ako nije ulogovan "Postavi oglas" vodi na login.php

### login.css:
- uklonjene neiskoriscene klase
- uklonjeni fiksirani width i height
- uklonjeni svi position absolute zbog responsiveness
- sekcija napravljena zbog SEO
- sekcija je min-100vh i max-width sa margin-x auto kao container
- sekcija je flex, ~~row na vecim ekranima~~
- html i body dodati responsive fix za mobilne
- izmenjena pozadinska boja u tamniju sivu sa gradijentom zbog bolje vidljivosti

### TODO:
- dodati stranicu za svaki oglas pojedinacno
- napraviti dodavanje oglasa za prijavljene korisnike
- dodati admin stranicu za upravljanje nalozima i oglasima

## __11. januar 2023.__

### baza:
- Dodata 2 primera automobila

### *.css:
- reformatiran za izgled

### index.css:
- object-fit na slikama oglasa postavljen na cover da se ne bi deformisala slika
- Pretraga izmene:
- uklonjeno .jedan, .dva, .tri... i popravljeni problemi usled izmene
- fiksirani width-evi izmenjeni u 100% zbog responsiveness (zbog galaxy fold telefona)
- Header izmene:
- header width promenjen na 100vw sa 100% zbog kompatibilnosti pretrazivaca
- header nav ul je uvek display flex, column na najmanjim ekranima (zbog galaxy fold telefona)
- Oglasi izmene:
- Width slike i oglasa (ekrani <768px) smanjen sa 300px na 250px (zbog galaxy fold telefona)

### db.php:
- funkcija get_korisnik(id)
- funkcija get_oglas_list()
- funkcija get_specifikacija(spec, id)    

### index.php:
- dodate ostale opcije za pretragu na pocetnoj
- oglasi se ucitavaju iz baze
- pretraga izmenjena iz diva u formu
- uklonjene klase jedan dva tri cetiri iz forme
- uklonjeni pocetni razmaci u placeholderima u inputu, dodat padding u cssu
- izmenjen naziv klase godiste u splitter, iskorisceno i u ceni
- dodati name za sve select-ove u formi da bi mogli da se koriste u pretrazi
- napravljena pretraga u potpunosti

### ./slike/*/
- Dodati folderi 3 i 4 - svaki automobil ima svoj folder u kom se nalaze njihove slike
- poklapace se sa id-om automobila

### TODO:
- dodati stranicu za svaki oglas pojedinacno
- dodati login i register sa sesijom

## __10. januar 2023.__
### U bazi:
-  Promenjen tip sifre u korisnicima sa varchar(40) na binary(60) da bi koristili BCRYPT za hesiranje lozinki.
- Promenjena tip role korisnicima sa varchar(40) na int(2) da bi koristili 0 = korisnik, 1 = admin.
- Promenjen telefon sa int(11) na varchar(11) da bi zadrzali pocetne nule.
-  Promenjena duzina maila na 320 karaktera (maksimalan teoretski limit emaila).

### ./dbconfig.php:
- Sadrzi mysql konfiguraciju php web aplikacije za rad sa bazom

### db.php:
- Sadrzi sve funkcije za rad sa bazom podataka.

### test.php:
- Testira konekciju sa bazom

### ./database_classes/:
- Sadrzi sve tabele u bazi i svaki objekat klasepredstavlja pojedinacni red
- Svaka klasa specifikacije (npr boja, broj_sedista...)prosiruje klasu Specifikacija 
koja sadrzi protected id, naziv i abstraktnu funkcijunaziv_tabele()

### ./slike/:
- Uklonjeni fajlovi CPU-Z i aida64 programa

### index.php:
- Promenjen naziv fajla iz index.html u index.php
- Marke vozila, karoserija, gorivo i vrsta menjaca se sada povlace iz baze

### TODO:
- Dovrsiti db.php