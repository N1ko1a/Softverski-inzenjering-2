<?php

session_start();

$title = "Polovnjaci - Oglas";

if (!isset($_GET["id"])) {
    header('Location: index.php');
    exit;
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";

$oglas = Database_operacije::get_instance()->get_oglas_po_id($_GET["id"]);

include($_SERVER["DOCUMENT_ROOT"] . "/../src/templates/oglas.view.php");