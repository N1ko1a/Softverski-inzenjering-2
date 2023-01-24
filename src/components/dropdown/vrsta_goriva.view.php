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