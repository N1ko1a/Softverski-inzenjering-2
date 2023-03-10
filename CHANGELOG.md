## __26. januar 2023.__ - Admin stranica

### public/admin.php:
- Prikaz admin stranice

### src/templates/admin.view.php:
- Prikazuje sve korisnike i oglase

### public/style/style.css
- Uklonjen header width: 100vw, overflowuje na chromiumu iz nekog razloga
- Dodat css za listu korisnika na admin stranici
- Ponovljeni media query-i spojeni u 1

### prikaz vozila:
- Na pocetnoj se vise ne prikazuju vozila koja nisu odobrena od strane administratora
- Sada administrator na stranici automobila ima opciju da odobri oglas (ili da povuce odobrenje)

### baza:
- Dodata kolona odobren(boolean) na oglasima
- Dodata tabela pretraga da bi napravili cuvanje pretraga

### dodavanje vozila:
- Korisnici koji nisu verifikovani od strane administratora ne mogu da dodaju oglase

### public/index.php:
- Dodato cuvanje i loadovanje sacuvanih pretraga

## __24. januar 2023.__ - Uklanjanje i dodavanje oglasa

### src/handlers/oglas/:
- Prebaceni sve klase handlera koji rade sa oglasima u handlers/oglas

### src/handlers/input/:
- Prebacene klase koje rade sa inputom korisnika
- Napravljene klase za input validaciju

### src/modules/:
- Search.php prebacen u folder modules
- Login.php dodat u folder modules
- Register.php dodat u folder modules

### src/Login.php:
- Klasa sluzi za validaciju i proveru incijala kod logina

### src/Register.php:
- Klasa sluzi za validaciju inputa i registraciju korisnika

### src/components/dropdown/:
- Folder sadrzi sve drop-down menije za selekciju

### src/components/pretraga.view.php:
- Drop down meni prebaceni u src/components/dropdown/

### public/style/automobil.css:
- Uklonjen

### public/novioglas.php:
- Preimenovano iz automobili.php u novioglas.php
- Loaduje se iz src/templates/novioglas.view.php
- Sada moze da se doda oglas

### src/modules/Dodaj_oglas.php:
- Proverava inpute, pravi oglas i resize-uje sliku na 800x600 i cuva je kao webp u odredjeni folder

### public/oglas.php:
- Prikazuje oglas sa odredjenim id-om
- Ispod oglasa se nalazi "UKLONI OGLAS" - vidi se samo administratoru i vlasniku oglasa

### public/uklonioglas.php:
- Proverava da li je korisnik administrator ili vlasnik oglasa
- Stavlja oglas aktivan=0 pa redirectuje na index

## __17. januar 2023.__ - bugfixing i best-practices

### *.php:
- Komponente koje sluze za prikaz elemenata preimenovane u *.view.php
- Popravljene greske usled promene strukture fajlova

### *.css:
- Migriran content login.css-a u index.css
- Migriran content register.css-a u index.css
- index.css preimenovan u style.css
- Premesteni svi @media query na kraj css fajla
- Uklonjeni login.css i register.css

### src/templates:
- Popunjeni templates pojedinih stranica

### public/*.php:
- Content se sada ucitava iz src/templates

### src/database/Oglas_input_builder
- Implementiran builder pattern za pravljenje oglasa

### src/database/Database_operacije.php:
- Oglas_input_builder se koristi za ucitavanje oglasa iz baze

### src/database/handlers/Input_handler.php:
- Napravljen interfejs Input handlera
- Chain of responsibility pattern

### public/index.php:
- Pretraga pretvorena u chain of responsibility pattern

### TODO
- Upotrebi Chain of Responsibility pattern za login i register input validaciju i sanitizaciju
- Napravi stranicu automobila
- Napravi admin stranicu

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