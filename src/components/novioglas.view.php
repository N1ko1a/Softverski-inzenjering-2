<?php
if (!$uspesno_dodavanje) {
?>
    <h4 class="error">Neuspesno dodavanje oglasa! Proverite sva polja i pokusajte ponovo!</h4>
<?php } ?>
<form class="pretraga" action="novioglas.php" method="post" enctype="multipart/form-data">

    <?php
    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/marka.view.php');
    ?>

    <input type="text" name="model" placeholder="Model">

    <?php
    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/karoserija.view.php');
    ?>

    <input type="number" name="godiste" placeholder="Godina proizvodnje">

    <input type="number" name="cena" placeholder="Cena">

    <?php
    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/vrsta_goriva.view.php');
    ?>

    <input type="number" name="kilometraza" placeholder="Kilometraza">

    <input type="number" name="zapremina" placeholder="Zapremina motora">

    <input type="number" name="snaga" placeholder="Snaga motora">

    <?php

    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/boja_vozila.view.php');

    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/vrsta_prenosa.view.php');

    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/broj_vrata.view.php');

    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/broj_sedista.view.php');

    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/emisiona_klasa_motora.view.php');

    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/klima.view.php');

    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/poreklo_vozila.view.php');

    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/vrsta_pogona.view.php');


    ?>

    <label for="slike" class="slike-selector">Izaberi slike
        <input type="file" id="slike" name="slike[]" multiple accept="image/*"/>
    </label>

    <textarea class="grid-span-3" name="opis" id="opis" cols="30" rows="10" placeholder="Opis automobila"></textarea>

    <button class="pretrazi" name="submit">DODAJ OGLAS</button>

</form>