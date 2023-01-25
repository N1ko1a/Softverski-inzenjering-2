<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$title = "Polovnjaci - Prijavi se";

if (isset($_SESSION["auth"])) {
    unset($_SESSION["auth"]);
    if (isset($_SESSION["admin"]))
        unset($_SESSION["admin"]);
    header('Location: index.php');
    exit;
};

require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/modules/Login.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Database_operacije.php';

$login = new Login();

$id = $login->login($_POST);

if ($id != -1) {
    $_SESSION["auth"] = $id;
    $korisnik = Database_operacije::get_instance()->get_korisnik($id);

    if ($korisnik->get_rola() == 1)
        $_SESSION["admin"] = true;

    header('Location: index.php');
    exit;
}

include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/login.view.php");