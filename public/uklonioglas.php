<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_GET["id"])) {
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION["auth"])) {
    header('Location: index.php');
    exit;
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";

$oglas = Database_operacije::get_instance()->get_oglas_po_id($_GET["id"]);

if ($oglas->getVlasnik()->get_id() != $_SESSION["auth"] && !isset($_SESSION["admin"])) {
    header('Location: index.php');
    exit;
}

Database_operacije::get_instance()->ukloni_oglas($_GET["id"]);

header('Location: index.php');