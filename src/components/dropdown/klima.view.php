<select name="klima">
    <option value="" disabled selected hidden>Klima</option>
    <?php
    for ($i = 0; $i < count($klime); $i++) {
    ?>
        <option value="<?php echo $klime[$i]->get_id(); ?>"><?php echo $klime[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>