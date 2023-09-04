<select name="stanje">
    <option value="" disabled <?php if (!isset($_GET["stanje"])) echo "selected"; ?> hidden>Stanje</option>
    <?php
    for ($i = 0; $i < count($stanje); $i++) {
    ?>
        <option
        <?php 
        if (isset($_GET["stanje"]) && $boje_vozila[$i]->get_id()== $_GET["stanje"]) 
        echo "selected"; ?> 
        value="<?php echo $stanje[$i]->get_id(); ?>"><?php echo $stanje[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>