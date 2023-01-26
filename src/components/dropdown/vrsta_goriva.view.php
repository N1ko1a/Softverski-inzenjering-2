<select name="vrsta_goriva">

    <option value="" disabled <?php if (!isset($_GET["vrsta_goriva"])) echo "selected"; ?> hidden>Gorivo</option>
    <?php
    for ($i = 0; $i < count($vrste_goriva); $i++) {
    ?>
        <option
        <?php 
        if (isset($_GET["vrsta_goriva"]) && $boje_vozila[$i]->get_id()== $_GET["vrsta_goriva"]) 
        echo "selected"; ?> 
        value="<?php echo $vrste_goriva[$i]->get_id(); ?>"><?php echo $vrste_goriva[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>

</select>