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