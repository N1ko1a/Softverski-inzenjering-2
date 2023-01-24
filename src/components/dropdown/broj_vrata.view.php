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