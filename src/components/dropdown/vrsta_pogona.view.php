<select name="vrsta_pogona">
    <option value="" disabled <?php if (!isset($_GET["vrsta_pogona"])) echo "selected"; ?> hidden>Vrsta pogona</option>
    <?php
    for ($i = 0; $i < count($vrste_pogona); $i++) {
    ?>
        <option
        <?php 
        if (isset($_GET["vrsta_pogona"]) && $boje_vozila[$i]->get_id()== $_GET["vrsta_pogona"]) 
        echo "selected"; ?> 
        value="<?php echo $vrste_pogona[$i]->get_id(); ?>"><?php echo $vrste_pogona[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>