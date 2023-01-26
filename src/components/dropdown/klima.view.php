<select name="klima">
    <option value="" disabled <?php if (!isset($_GET["klima"])) echo "selected"; ?> hidden>Klima</option>
    <?php
    for ($i = 0; $i < count($klime); $i++) {
    ?>
        <option 
        <?php 
        if (isset($_GET["klima"]) && $boje_vozila[$i]->get_id()== $_GET["klima"]) 
        echo "selected"; ?> 
        value="<?php echo $klime[$i]->get_id(); ?>"><?php echo $klime[$i]->getNaziv(); ?></option>
    <?php
    }
    ?>
</select>