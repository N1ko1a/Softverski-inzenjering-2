<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
//startovanje sesije
session_start();
//postavljanje naslova stranice
$title = "Polovnjaci - Oglas";
//provera postojanja parametra id ako ne postoji vracamo ga na pocetnu stranicu
if (!isset($_GET["id"])) {
    header('Location: index.php');
    exit;
}
//ukljucivanje klase
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";
//dobijanje oglasa po id-u
$oglas = Database_operacije::get_instance()->get_oglas_po_id($_GET["id"]);
//prikaz stranice oglas
include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/oglas.view.php");