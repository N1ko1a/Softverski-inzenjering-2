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