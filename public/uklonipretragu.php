<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//proveravamo ako korisnik nije ulogovan i ako nema id-a vracamo ga na index stranicu
if (!isset($_SESSION["auth"]) || !isset($_GET["id"])) {
    header('Location: index.php');
    exit;
};

require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";
//pozivamo pretragu na osnovu id-a
$pretraga = Database_operacije::get_instance()->get_pretraga($_GET["id"]);
//ako vlasnik sacuvane pretrage nije isti kao trenutni korisnik vracamo ga na index stranu
if ($pretraga->getKorisnik() != $_SESSION["auth"]) {
    header('Location: index.php');
    exit;
}
//brisanje pretrage
Database_operacije::get_instance()->ukloni_pretragu($_GET["id"]);
header('Location: index.php');
exit;