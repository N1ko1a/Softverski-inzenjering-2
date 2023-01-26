<select name="karoserija">
    <option value="" disabled <?php if (!isset($_GET["karoserija"])) echo "selected"; ?> hidden>Karoserija</option>
    <?php
    for ($i = 0; $i < count($karoserije); $i++) {
    ?>
        <option
        <?php 
        if (isset($_GET["karoserija"]) && $boje_vozila[$i]->get_id()== $_GET["karoserija"]) 
        echo "selected"; ?> 
        value="<?php echo $karoserije[$i]->get_id(); ?>"><?php echo $karoserije[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>