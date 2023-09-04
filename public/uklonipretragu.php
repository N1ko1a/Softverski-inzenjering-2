<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION["auth"]) || !isset($_GET["id"])) {
    header('Location: index.php');
    exit;
};

require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";

$pretraga = Database_operacije::get_instance()->get_pretraga($_GET["id"]);

if ($pretraga->getKorisnik() != $_SESSION["auth"]) {
    header('Location: index.php');
    exit;
}

Database_operacije::get_instance()->ukloni_pretragu($_GET["id"]);
header('Location: index.php');
exit;