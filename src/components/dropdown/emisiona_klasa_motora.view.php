<select name="emisiona_klasa_motora">
    <option value="" disabled <?php if (!isset($_GET["emisiona_klasa_motora"])) echo "selected"; ?> hidden>Emisiona klasa motora</option>
    <?php
    for ($i = 0; $i < count($emisione_klase_motora); $i++) {
    ?>
        <option
        <?php 
        if (isset($_GET["emisiona_klasa_motora"]) && $boje_vozila[$i]->get_id()== $_GET["emisiona_klasa_motora"]) 
        echo "selected"; ?> 
        value="<?php echo $emisione_klase_motora[$i]->get_id(); ?>"><?php echo $emisione_klase_motora[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>