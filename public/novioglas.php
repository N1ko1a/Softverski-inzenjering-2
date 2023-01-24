<?php
session_start();

if (!isset($_SESSION["auth"])) {
    header('Location: index.php');
    exit;
};

$title = "Polovnjaci - Dodaj oglas";

require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";

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

require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/modules/Search.php";

$search = new Search();

$vozila = $search->filter_results($vozila, array("vlasnik" => $_SESSION["auth"]));

$uspesno_dodavanje = true;

if (isset($_POST["submit"])) {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/modules/Dodaj_oglas.php";
    $dodaj_oglas = new Dodaj_oglas();
    $uspesno_dodavanje = $dodaj_oglas->dodaj_oglas($_SESSION["auth"], $_POST);
}

include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/novioglas.view.php");
