<?php
//postavka greske
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pokretanje sesije
session_start();
//postavljamo naslov stranice
$title = "Pocetna";
//ukljucujemo klasu za bazu podataka

include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/pocetna.view.php");