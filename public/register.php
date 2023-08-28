<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$title = "Polovnjaci - Registruj se";
//ako je neki korisnik ulogovan izloguj ga
if (isset($_SESSION["auth"])) {
    unset($_SESSION["auth"]);
    //vrati ga na index stranicu
    header('Location: index.php');
    exit;
};
//provera promenjenih stanja
$postoji_korisnik_username = false;
$postoji_korisnik_email = false;
$lozinke_se_ne_poklapaju = false;
//ukljucivanje klase 
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/modules/Register.php';
//kreiranje nove instance
$register = new Register();
//registacija korisnika
if ($register->register($_POST)) {
    header('Location: login.php?reg=1');
    exit;
}

include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/register.view.php");