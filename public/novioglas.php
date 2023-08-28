<?php
//postavka greske
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pokretanje sesije
session_start();
//ako korisnik nije prijavljen salje se na stranicu index
if (!isset($_SESSION["auth"])) {
    header('Location: index.php');
    exit;
};
//postavljanje naslova stranice
$title = "Polovnjaci - Dodaj oglas";
//ukljucivanje klase database
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";
//dobavljanje specifikacija 
$marke = Database_operacije::get_instance()->get_specifikacija_list(new Marka());
$list = Database_operacije::get_instance()->get_specifikacija_list(new Karoserija());
$karoserije = Database_operacije::get_instance()->get_specifikacija_list(new Karoserija());
$vrste_goriva = Database_operacije::get_instance()->get_specifikacija_list(new Vrsta_goriva());
$boje_vozila = Database_operacije::get_instance()->get_specifikacija_list(new Boja_vozila());
$vrste_prenosa = Database_operacije::get_instance()->get_specifikacija_list(new Vrsta_prenosa());
$brojevi_vrata = Database_operacije::get_instance()->get_specifikacija_list(new Broj_vrata());
$brojevi_sedista = Database_operacije::get_instance()->get_specifikacija_list(new Broj_sedista());
$emisione_klase_motora = Database_operacije::get_instance()->get_specifikacija_list(new Emisiona_klasa_motora());
$klime = Database_operacije::get_instance()->get_specifikacija_list(new Klima());
$porekla_vozila = Database_operacije::get_instance()->get_specifikacija_list(new Poreklo_vozila());
$vrste_pogona = Database_operacije::get_instance()->get_specifikacija_list(new Vrsta_pogona());
$vozila = Database_operacije::get_instance()->get_oglas_list();
//ukljucivanje klase za pretragu
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/modules/Search.php";
//kreiranje instance klase za pretragu
$search = new Search();
//filtriranje oglasa po vlasniku(prikazuju se samo oni oglasi koji pripadaju vlasniku)
$vozila = $search->filter_vlasnik($vozila, $_SESSION["auth"]);

$uspesno_dodavanje = true;
//dobavlja se informacija da li je korisnik verifikovan ili ne iz baze podataka
$verifikovan = Database_operacije::get_instance()->get_korisnik($_SESSION["auth"])->get_verifikovan();
//dodavanje oglasa ako je forma submitovana
if (isset($_POST["submit"]) && $verifikovan) { //ako je post zahtev poslata i ako je korisnik verifikovan
    //ukljucujemo klasu 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/modules/Dodaj_oglas.php";
    //kreiramo novu instancu klase 
    $dodaj_oglas = new Dodaj_oglas();
    //dodajemo oglas
    $uspesno_dodavanje = $dodaj_oglas->dodaj_oglas($_SESSION["auth"], $_POST);
}
//prikaz stranice novioglas
include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/novioglas.view.php");
