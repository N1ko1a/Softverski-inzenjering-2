<?php
//postavka greske
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//startovanje nove sesije
session_start();
//proveravamo da li postoji id vracamo korisnika na pocetnu stranicu
if (!isset($_GET["id"])) {
    header('Location: index.php');
    exit;
}
//ako korisnik nije prijavljen vracamo ga na pocetnu stranicu
if (!isset($_SESSION["auth"])) {
    header('Location: index.php');
    exit;
}
//ako takodje nije prijavljen kao admin vracamo ga na pocetnu stranicu
if (!isset($_SESSION["admin"])) {
    header('Location: index.php');
    exit;
}
//ukljucivanje klase
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";
//menjamo odobrenje oglasa
Database_operacije::get_instance()->izmeni_odobrenje($_GET["id"]);
//vracamo se na admin stranicu
header('Location: admin.php');
