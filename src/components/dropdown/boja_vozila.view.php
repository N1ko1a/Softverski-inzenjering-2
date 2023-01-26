<select name="boja_vozila">
    <option value="" disabled <?php if (!isset($_GET["boja_vozila"])) echo "selected"; ?> hidden>Boja vozila</option>
    <?php
    for ($i = 0; $i < count($boje_vozila); $i++) {
    ?>
        <option 
        <?php 
        if (isset($_GET["boja_vozila"]) && $boje_vozila[$i]->get_id()== $_GET["boja_vozila"]) 
        echo "selected"; ?> 
        value="<?php echo $boje_vozila[$i]->get_id(); ?>"><?php echo $boje_vozila[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>