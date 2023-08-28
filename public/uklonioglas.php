<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//ako ne postoji id vrati na index
if (!isset($_GET["id"])) {
    header('Location: index.php');
    exit;
}
//ako korisnik nije ulogovan vrati na index
if (!isset($_SESSION["auth"])) {
    header('Location: index.php');
    exit;
}
//ukljucivanje klase
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";
//dobavljanje oglasa po id-u
$oglas = Database_operacije::get_instance()->get_oglas_po_id($_GET["id"]);
//ako vlasnik oglasa nije trenutno prijavljen korisnik i ako taj korisnik nije administrator vracamo ga na index stranicu
if ($oglas->getVlasnik()->get_id() != $_SESSION["auth"] && !isset($_SESSION["admin"])) {
    header('Location: index.php');
    exit;
}
//pozivanje metode za brisanje oglasa
Database_operacije::get_instance()->ukloni_oglas($_GET["id"]);
//vracamo se na index
header('Location: index.php');