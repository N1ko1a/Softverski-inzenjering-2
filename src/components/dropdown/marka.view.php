<select name="marka">
    <option value="" disabled <?php if (!isset($_GET["marka"])) echo "selected"; ?> hidden>Marka vozila</option>
    <?php
    for ($i = 0; $i < count($marke); $i++) {
    ?>
        <option 
        <?php 
        if (isset($_GET["marka"]) && $boje_vozila[$i]->get_id()== $_GET["marka"]) 
        echo "selected"; ?> 
        value="<?php echo $marke[$i]->get_id(); ?>"><?php echo $marke[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>