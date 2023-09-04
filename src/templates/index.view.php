<?php
include($_SERVER["DOCUMENT_ROOT"] . "/../src/components/head.view.php");
include($_SERVER["DOCUMENT_ROOT"] . "/../src/components/navbar.view.php");
if (isset($_SESSION["auth"]))
    include($_SERVER["DOCUMENT_ROOT"] . "/../src/components/pretrage_modal.view.php");
include($_SERVER["DOCUMENT_ROOT"] . "/../src/components/pretraga.view.php");
include($_SERVER["DOCUMENT_ROOT"] . "/../src/components/prikaz_vozila.view.php");
include($_SERVER["DOCUMENT_ROOT"] . "/../src/components/footer.view.php");