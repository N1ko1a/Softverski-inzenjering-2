<select name="poreklo_vozila">
    <option value="" disabled <?php if (!isset($_GET["poreklo_vozila"])) echo "selected"; ?> hidden>Poreklo vozila</option>
    <?php
    for ($i = 0; $i < count($porekla_vozila); $i++) {
    ?>
        <option
        <?php 
        if (isset($_GET["poreklo_vozila"]) && $boje_vozila[$i]->get_id()== $_GET["poreklo_vozila"]) 
        echo "selected"; ?> 
        value="<?php echo $porekla_vozila[$i]->get_id(); ?>"><?php echo $porekla_vozila[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>