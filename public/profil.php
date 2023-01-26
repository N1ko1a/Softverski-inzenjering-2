<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION["auth"])) {
    header("Location: index.php");
    exit;
}

if (!isset($_GET["id"])) {
    $_GET["id"] = $_SESSION["auth"];
}

if ($_GET["id"] != $_SESSION["auth"] && !isset($_SESSION["admin"])) {
    header("Location: index.php");
    exit;
}

$title = "Polovnjaci - Profil";

require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";

if (isset($_GET["izmeni_ime"]) && isset($_GET["ime"])) {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/handlers/input/Ime_handler.php";

    $ime_handler = new Ime_handler();

    if (!$ime_handler->process($_GET)) {
        header("Location: profil.php?id=" . $_GET["id"]);
        exit;
    }

    Database_operacije::get_instance()->izmeni_ime($_GET["id"], $_GET["ime"]);
    header("Location: profil.php?id=" . $_GET["id"]);

}

if (isset($_GET["izmeni_prezime"]) && isset($_GET["prezime"])) {

    require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/handlers/input/Prezime_handler.php";

    $handler = new Prezime_handler();

    if (!$handler->process($_GET)) {
        header("Location: profil.php?id=" . $_GET["id"]);
        exit;
    }
    
    Database_operacije::get_instance()->izmeni_prezime($_GET["id"], $_GET["prezime"]);
    header("Location: profil.php?id=" . $_GET["id"]);

}

if (isset($_GET["izmeni_username"]) && isset($_GET["username"])) {

    require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/handlers/input/Username_handler.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/handlers/input/Postojeci_username_handler.php";

    $handler = new Username_handler();
    $handler->set_next_handler(new Postojeci_username_handler());

    if (!$handler->process($_GET)) {
        header("Location: profil.php?id=" . $_GET["id"]);
        exit;
    }

    Database_operacije::get_instance()->izmeni_username($_GET["id"], $_GET["username"]);
    header("Location: profil.php?id=" . $_GET["id"]);
}

if (isset($_GET["izmeni_telefon"]) && isset($_GET["telefon"])) {

    require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/handlers/input/Telefon_handler.php";

    $handler = new Telefon_handler();

    if (!$handler->process($_GET)) {
        header("Location: profil.php?id=" . $_GET["id"]);
        exit;
    }
    
    Database_operacije::get_instance()->izmeni_telefon($_GET["id"], $_GET["telefon"]);
    header("Location: profil.php?id=" . $_GET["id"]);
}

if (isset($_POST["izmeni_email"]) && isset($_POST["email"])) {

    require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/handlers/input/Email_handler.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/handlers/input/Postojeci_email_handler.php";

    $handler = new Email_handler();
    $handler->set_next_handler(new Postojeci_email_handler());

    if (!$handler->process($_POST)) {
        header("Location: profil.php?id=" . $_POST["id"]);
        exit;
    }

    Database_operacije::get_instance()->izmeni_email($_POST["id"], $_POST["email"]);
    header("Location: profil.php?id=" . $_POST["id"]);
    
}

if (
   isset($_GET["izmeni_lozinku"]) && 
   isset($_POST["password"]) && 
   isset($_POST["repassword"]) && 
   isset($_POST["id"])) {

    require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/handlers/input/Password_handler.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/handlers/input/Password_ponovljeni_handler.php";

    $handler = new Password_handler();
    $handler->set_next_handler(new Password_ponovljeni_handler());

    if (!$handler->process($_GET)) {
        header("Location: profil.php?id=" . $_GET["id"]);
        exit;
    }

    Database_operacije::get_instance()->izmeni_lozinku($_GET["id"], $_POST["password"]);
    header("Location: profil.php?id=" . $_POST["id"]);

}


$profil = Database_operacije::get_instance()->get_korisnik($_GET["id"]);



include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/profil.view.php");
