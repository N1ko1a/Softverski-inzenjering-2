<form class="pretraga" action="index.php">

    <select name="marka">
        <option value="" disabled selected hidden>Marka vozila</option>
        <?php
        for ($i = 0; $i < count($marke); $i++) {
        ?>
            <option value="<?php echo $marke[$i]->get_id(); ?>"><?php echo $marke[$i]->getNaziv(); ?></option>
        <?php
        }
        ?>
    </select>

    <input type="text" name="model" placeholder="Model">

    <div class="splitter">

        <input type="number" name="cenaod" placeholder="Cena od">

        <input type="number" name="cenado" placeholder="Do">

    </div>

    <select name="karoserija">
        <option value="" disabled selected hidden>Karoserija</option>
        <?php
        for ($i = 0; $i < count($karoserije); $i++) {
        ?>
            <option value="<?php echo $karoserije[$i]->get_id(); ?>"><?php echo $karoserije[$i]->getNaziv(); ?></option>
        <?php
        }
        ?>
    </select>
    
    <div class="splitter">

        <input type="number" name="godisteod" placeholder="Godiste od">

        <input type="number" name="godistedo" placeholder="Do">

    </div>

    <select name="vrsta_goriva">

        <option value="" disabled selected hidden>Gorivo</option>
        <?php
        for ($i = 0; $i < count($vrste_goriva); $i++) {
        ?>
            <option value="<?php echo $vrste_goriva[$i]->get_id(); ?>"><?php echo $vrste_goriva[$i]->getNaziv(); ?></option>
        <?php
        }
        ?>

    </select>

    <input type="text" name="kilometraza" placeholder="Kilometraza do">

    <select name="boja_vozila">
        <option value="" disabled selected hidden>Boja vozila</option>
        <?php
        for ($i = 0; $i < count($boje_vozila); $i++) {
        ?>
            <option value="<?php echo $boje_vozila[$i]->get_id(); ?>"><?php echo $boje_vozila[$i]->getNaziv(); ?></option>
        <?php
        }
        ?>
    </select>

    <select name="vrsta_prenosa">
        <option value="" disabled selected hidden>Vrsta prenosa</option>
        <?php
        for ($i = 0; $i < count($vrste_prenosa); $i++) {
        ?>
            <option value="<?php echo $vrste_prenosa[$i]->get_id(); ?>"><?php echo $vrste_prenosa[$i]->getNaziv(); ?></option>
        <?php
        }
        ?>
    </select>

    <select name="broj_vrata">
        <option value="" disabled selected hidden>Broj vrata</option>
        <?php
        for ($i = 0; $i < count($brojevi_vrata); $i++) {
        ?>
            <option value="<?php echo $brojevi_vrata[$i]->get_id(); ?>"><?php echo $brojevi_vrata[$i]->getNaziv(); ?></option>
        <?php
        }
        ?>
    </select>

    <select name="broj_sedista">
        <option value="" disabled selected hidden>Broj sedista</option>
        <?php
        for ($i = 0; $i < count($brojevi_sedista); $i++) {
        ?>
            <option value="<?php echo $brojevi_sedista[$i]->get_id(); ?>"><?php echo $brojevi_sedista[$i]->getNaziv(); ?></option>
        <?php
        }
        ?>
    </select>

    <select name="emisiona_klasa_motora">
        <option value="" disabled selected hidden>Emisiona klasa motora</option>
        <?php
        for ($i = 0; $i < count($emisione_klase_motora); $i++) {
        ?>
            <option value="<?php echo $emisione_klase_motora[$i]->get_id(); ?>"><?php echo $emisione_klase_motora[$i]->getNaziv(); ?></option>
        <?php
        }
        ?>
    </select>

    <select name="klima">
        <option value="" disabled selected hidden>Klima</option>
        <?php
        for ($i = 0; $i < count($klime); $i++) {
        ?>
            <option value="<?php echo $klime[$i]->get_id(); ?>"><?php echo $klime[$i]->getNaziv(); ?></option>
        <?php
        }
        ?>
    </select>

    <select name="poreklo_vozila">
        <option value="" disabled selected hidden>Poreklo vozila</option>
        <?php
        for ($i = 0; $i < count($porekla_vozila); $i++) {
        ?>
            <option value="<?php echo $porekla_vozila[$i]->get_id(); ?>"><?php echo $porekla_vozila[$i]->getNaziv(); ?></option>
        <?php
        }
        ?>
    </select>

    <select name="vrsta_pogona">
        <option value="" disabled selected hidden>Vrsta pogona</option>
        <?php
        for ($i = 0; $i < count($vrste_pogona); $i++) {
        ?>
            <option value="<?php echo $vrste_pogona[$i]->get_id(); ?>"><?php echo $vrste_pogona[$i]->getNaziv(); ?></option>
        <?php
        }
        ?>
    </select>

    <button class="pretrazi">PRETRAZI</button>
    
</form>