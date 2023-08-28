<?php
//postavke greske
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pokrecemo sesiju
session_start();
//postavljamo naslov stranice
$title = "Polovnjaci - Prijavi se";
//prvo proveravamo da li postoji aktivna sesija, ako postoji uklanja je cime se prakticno korisnik odjavljuje
//takodje ako postoji admin sesija i ona se uklanja
if (isset($_SESSION["auth"])) {
    unset($_SESSION["auth"]);
    if (isset($_SESSION["admin"]))
        unset($_SESSION["admin"]);
    //redirekcija na pocetnu stranu
    header('Location: index.php');
    exit;
};
//ukljucivanje klasa login i databes
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/modules/Login.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Database_operacije.php';
//kreiranje instance kalse login
$login = new Login();
//pokusaj prijavljivanja
$id = $login->login($_POST);
//provera rezultata prijavljivanja ako se rezultat razlikuje od -1 onda je prijavljivanje uspenso
if ($id != -1) {
    //postavlja se sesija na identifikator korisnika id
    $_SESSION["auth"] = $id;
    //dobavlja se korisnikov objekat iz baze podataka
    $korisnik = Database_operacije::get_instance()->get_korisnik($id);
//proveravaju se uloge korisnika ako je =1 postavlja se admin na true
    if ($korisnik->get_rola() == 1)
        $_SESSION["admin"] = true;
//redirekcija na pocetnu stranu
    header('Location: index.php');
    exit;
}
//prikaz stranice login
include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/login.view.php");