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