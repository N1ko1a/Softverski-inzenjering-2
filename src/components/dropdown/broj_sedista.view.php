<select name="broj_sedista">
    <option value="" disabled <?php if (!isset($_GET["broj_sedista"])) echo "selected"; ?> hidden>Broj sedista</option>
    <?php
    for ($i = 0; $i < count($brojevi_sedista); $i++) {
    ?>
        <option
        <?php 
        if (isset($_GET["broj_sedista"]) && $boje_vozila[$i]->get_id()== $_GET["broj_sedista"]) 
        echo "selected"; ?> 
        value="<?php echo $brojevi_sedista[$i]->get_id(); ?>"><?php echo $brojevi_sedista[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>