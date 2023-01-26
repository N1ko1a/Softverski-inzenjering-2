<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION["admin"])) {
    header('Location: index.php');
    exit;
}

$title = "Polovnjaci - Admin stranica";

require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";

if (isset($_GET["promenirole"]) && isset($_GET["id"])) {
    Database_operacije::get_instance()->izmeni_role($_GET["id"]);
    header('Location: admin.php'); // da ne bi ostajalo na refresh
    exit;
}

if (isset($_GET["promeniverifikaciju"]) && isset($_GET["id"])) {
    Database_operacije::get_instance()->izmeni_verifikovan($_GET["id"]);
    header('Location: admin.php');
    exit;
}

$vozila = Database_operacije::get_instance()->get_oglas_list();
$korisnici = Database_operacije::get_instance()->get_korisnik_list();

include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/admin.view.php");