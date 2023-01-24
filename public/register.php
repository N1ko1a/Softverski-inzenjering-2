<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$title = "Polovnjaci - Registruj se";

if (isset($_SESSION["auth"])) {
    unset($_SESSION["auth"]);
    header('Location: index.php');
    exit;
};

$postoji_korisnik_username = false;
$postoji_korisnik_email = false;
$lozinke_se_ne_poklapaju = false;

require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/modules/Register.php';

$register = new Register();

if ($register->register($_POST)) {
    header('Location: login.php?reg=1');
    exit;
}

include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/register.view.php");