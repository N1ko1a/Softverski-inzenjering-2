<select name="emisiona_klasa_motora">
    <option value="" disabled selected hidden>Emisiona klasa motora</option>
    <?php
    for ($i = 0; $i < count($emisione_klase_motora); $i++) {
    ?>
        <option value="<?php echo $emisione_klase_motora[$i]->get_id(); ?>"><?php echo $emisione_klase_motora[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>