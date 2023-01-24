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