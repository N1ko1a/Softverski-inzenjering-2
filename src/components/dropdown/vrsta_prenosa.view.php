<select name="vrsta_prenosa">
    <option value="" disabled <?php if (!isset($_GET["vrsta_prenosa"])) echo "selected"; ?> hidden>Vrsta prenosa</option>
    <?php
    for ($i = 0; $i < count($vrste_prenosa); $i++) {
    ?>
        <option
        <?php 
        if (isset($_GET["vrsta_prenosa"]) && $boje_vozila[$i]->get_id()== $_GET["vrsta_prenosa"]) 
        echo "selected"; ?> 
        value="<?php echo $vrste_prenosa[$i]->get_id(); ?>"><?php echo $vrste_prenosa[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>