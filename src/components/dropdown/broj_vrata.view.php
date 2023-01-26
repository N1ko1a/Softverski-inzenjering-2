<select name="broj_vrata">
    <option value="" disabled <?php if (!isset($_GET["broj_vrata"])) echo "selected"; ?> hidden>Broj vrata</option>
    <?php
    for ($i = 0; $i < count($brojevi_vrata); $i++) {
    ?>
        <option 
        <?php 
        if (isset($_GET["broj_vrata"]) && $boje_vozila[$i]->get_id()== $_GET["broj_vrata"]) 
        echo "selected"; ?> 
        value="<?php echo $brojevi_vrata[$i]->get_id(); ?>"><?php echo $brojevi_vrata[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>