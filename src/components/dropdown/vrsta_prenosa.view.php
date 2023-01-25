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