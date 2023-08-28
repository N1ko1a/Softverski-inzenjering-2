<?php
//postavka greske
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//startovanje sesije
session_start();
//proverava se da li je sesija admin ako nije vraca korisnikia na index.php
if (!isset($_SESSION["admin"])) {
    header('Location: index.php');
    exit;
}
//Postavljanje naslova stranice
$title = "Polovnjaci - Admin stranica";
//ukljucuje se klasa za bazu podataka
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";
//promena uloge 
if (isset($_GET["promenirole"]) && isset($_GET["id"])) {
    Database_operacije::get_instance()->izmeni_role($_GET["id"]);
    header('Location: admin.php'); // da ne bi ostajalo na refresh
    exit;
}
//promena verifikacije korisnika
if (isset($_GET["promeniverifikaciju"]) && isset($_GET["id"])) {
    Database_operacije::get_instance()->izmeni_verifikovan($_GET["id"]);
    header('Location: admin.php');
    exit;
}
//dobavljanje korisnika i oglasa
$vozila = Database_operacije::get_instance()->get_oglas_list();
$korisnici = Database_operacije::get_instance()->get_korisnik_list();
//sablon za prikaza admin stranice
include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/admin.view.php");