<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";

$dbo = Database_operacije::get_instance();

echo "<p>Testiram fetch marki automobila...</p>";

echo "<ul>";

$niz = $dbo->get_specifikacija_list(new Marka());

for ($i = 0; $i < count($niz); $i++) {
    echo "<li>" . $niz[$i]->getNaziv() . "</li>";
}
echo "</ul>";