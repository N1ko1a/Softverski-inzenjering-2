<?php
include($_SERVER["DOCUMENT_ROOT"] . "/../src/components/head.view.php");
include($_SERVER["DOCUMENT_ROOT"] . "/../src/components/navbar.view.php");
if ($verifikovan)
    include($_SERVER["DOCUMENT_ROOT"] . "/../src/components/novioglas.view.php");
else
    echo "<h2 style='color: red; text-align: center; margin: 20px 0; font-family: Arial, Helvetica, sans-serif;'>Samo verifikovani nalozi mogu da dodaju oglase! Molimo Vas da sacekate da vam administrator odobri nalog.</h2>";
include($_SERVER["DOCUMENT_ROOT"] . "/../src/components/tvoji_oglasi.view.php");
include($_SERVER["DOCUMENT_ROOT"] . "/../src/components/footer.view.php");