<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$title = "Polovnjaci - Prijavi se";

if (isset($_SESSION["auth"])) {
    unset($_SESSION["auth"]);
    header('Location: index.php');
    exit;
};

include( $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php");

if (isset($_POST["submit"]) && isset($_POST["username"]) && isset($_POST["password"])) {

    /* "dezinfekcija" username (prima user.name, user, user1.name2.name3 i slicno)
     * da ne bi doslo do XSS napada
     * https://regex101.com/r/O9KdEr/1
     */
    $username = filter_var($_POST["username"], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]+(\.?[a-zA-Z0-9]+)*$/")));
    // limitiramo i duzinu username
    if (strlen($username) > 40) {
        $username = substr($username, 0, 40);
    }

    /* lozinku ne moramo da dezinfikujemo jer u proveri_kredencijale se proverava sa 
     * hesiranom lozinkom i ne ulazi direkt u sql kod kao username
     */
    $password = $_POST["password"];

    $id = Database_operacije::get_instance()->proveri_kredencijale($username, $password);

    if ($id != -1) {
        $_SESSION["auth"] = $id;
        header('Location: index.php');
        exit;
    }
}

include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/login.view.php");