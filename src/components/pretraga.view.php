<form class="pretraga" action="index.php">

    <?php
    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/marka.view.php');
    ?>

    <input type="text" name="model" placeholder="Model" value="<?php echo isset($_GET["model"]) ? $_GET["model"] : ""; ?>">

    <div class="splitter">

        <input type="number" name="cenaod" placeholder="Cena od" value="<?php echo isset($_GET["cenaod"]) ? $_GET["cenaod"] : ""; ?>">

        <input type="number" name="cenado" placeholder="Do" value="<?php echo isset($_GET["cenado"]) ? $_GET["cenado"] : ""; ?>">

    </div>

    <?php
    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/karoserija.view.php');
    ?>

    <div class="splitter">

        <input type="number" name="godisteod" placeholder="Godiste od" value="<?php echo isset($_GET["godisteod"]) ? $_GET["godisteod"] : ""; ?>">

        <input type="number" name="godistedo" placeholder="Do" value="<?php echo isset($_GET["godistedo"]) ? $_GET["godistedo"] : ""; ?>">

    </div>

    <?php
    include($_SERVER["DOCUMENT_ROOT"] . '/../src/components/dropdown/vrsta_goriva.view.php');
    ?>

    <input type="number" name="kilometraza" placeholder="Kilometraza do" value="<?php echo isset($_GET["kilometraza"]) ? $_GET["kilometraza"] : ""; ?>">

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

    <div class="pretrazi">

        <button>PRETRAZI</button>

        <?php
        if (isset($_SESSION["auth"])) {
        ?>

            <button type="button" id="ucitaj-pretragu">

                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.6 18L10.3 11.7C9.8 12.1 9.225 12.4167 8.575 12.65C7.925 12.8833 7.23333 13 6.5 13C4.68333 13 3.146 12.371 1.888 11.113C0.629333 9.85433 0 8.31667 0 6.5C0 4.68333 0.629333 3.14567 1.888 1.887C3.146 0.629 4.68333 0 6.5 0C8.31667 0 9.85433 0.629 11.113 1.887C12.371 3.14567 13 4.68333 13 6.5C13 7.23333 12.8833 7.925 12.65 8.575C12.4167 9.225 12.1 9.8 11.7 10.3L18 16.6L16.6 18ZM6.5 11C7.75 11 8.81267 10.5627 9.688 9.688C10.5627 8.81267 11 7.75 11 6.5C11 5.25 10.5627 4.18733 9.688 3.312C8.81267 2.43733 7.75 2 6.5 2C5.25 2 4.18733 2.43733 3.312 3.312C2.43733 4.18733 2 5.25 2 6.5C2 7.75 2.43733 8.81267 3.312 9.688C4.18733 10.5627 5.25 11 6.5 11ZM4.5 9.5L5.25 7.05L3.25 5.45H5.7L6.5 3L7.3 5.45H9.75L7.75 7.05L8.5 9.5L6.5 7.95L4.5 9.5Z" fill="black" />
                </svg>

            </button>

            <button id="sacuvaj-pretragu" name="sacuvaj">

                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 4V16C18 16.55 17.8043 17.021 17.413 17.413C17.021 17.8043 16.55 18 16 18H2C1.45 18 0.979 17.8043 0.587 17.413C0.195667 17.021 0 16.55 0 16V2C0 1.45 0.195667 0.979 0.587 0.587C0.979 0.195667 1.45 0 2 0H14L18 4ZM9 15C9.83333 15 10.5417 14.7083 11.125 14.125C11.7083 13.5417 12 12.8333 12 12C12 11.1667 11.7083 10.4583 11.125 9.875C10.5417 9.29167 9.83333 9 9 9C8.16667 9 7.45833 9.29167 6.875 9.875C6.29167 10.4583 6 11.1667 6 12C6 12.8333 6.29167 13.5417 6.875 14.125C7.45833 14.7083 8.16667 15 9 15ZM3 7H12V3H3V7Z" fill="black" />
                </svg>

            </button>
        <?php }
        ?>

    </div>


</form>