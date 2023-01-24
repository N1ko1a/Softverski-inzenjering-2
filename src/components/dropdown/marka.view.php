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