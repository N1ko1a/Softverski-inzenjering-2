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