<form class="pretraga" action="index.php">

    <?php
    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/marka.view.php');
    ?>

    <input type="text" name="model" placeholder="Model">

    <div class="splitter">

        <input type="number" name="cenaod" placeholder="Cena od">

        <input type="number" name="cenado" placeholder="Do">

    </div>

    <?php
    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/karoserija.view.php');
    ?>

    <div class="splitter">

        <input type="number" name="godisteod" placeholder="Godiste od">

        <input type="number" name="godistedo" placeholder="Do">

    </div>

    <?php
    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/vrsta_goriva.view.php');
    ?>

    <input type="number" name="kilometraza" placeholder="Kilometraza do">

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

    <button class="pretrazi">PRETRAZI</button>

</form>