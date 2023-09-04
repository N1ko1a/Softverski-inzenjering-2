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

if (!isset($_SESSION["admin"])) {
    header('Location: index.php');
    exit;
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";

Database_operacije::get_instance()->izmeni_odobrenje($_GET["id"]);

header('Location: admin.php');
