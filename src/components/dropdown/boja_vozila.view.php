<select name="boja_vozila">
    <!-- Prva opcija (placeholder): U ovoj opciji koristi se atribut "disabled" kako bi se onemogućilo biranje, i "hidden" kako bi se sakrila opcija dok ne bude izabrana. Ako $_GET["boja_vozila"] nije postavljen (što znači da korisnik nije izabrao boju vozila), dodaje se atribut "selected" kako bi se označila ova opcija kao inicijalno izabrana i prikazala kao placeholder. -->
    <option value="" disabled <?php if (!isset($_GET["boja_vozila"])) echo "selected"; ?> hidden>Boja vozila</option>
    <?php
    // Prolazi se kroz listu dostupnih boja vozila (pretpostavka je da su boje vozila smeštene u nizu $boje_vozila), i za svaku boju se generiše opcija u selektu.
    for ($i = 0; $i < count($boje_vozila); $i++) {
    ?>
    <!-- Za svaku boju iz liste, kreira se HTML <option> element. Ako je $_GET["boja_vozila"] postavljen i jednak ID-ju trenutne boje, dodaje se atribut "selected" kako bi se označila kao izabrana. Takođe, atribut "value" se postavlja na ID boje, što će biti poslat serveru kada se forma pošalje -->
        <option 
        <?php 
        if (isset($_GET["boja_vozila"]) && $boje_vozila[$i]->get_id()== $_GET["boja_vozila"]) 
        echo "selected"; ?> 
        value="<?php echo $boje_vozila[$i]->get_id(); ?>"><?php echo $boje_vozila[$i]->getNaziv(); ?></option>
        <!-- Tekst opcije: Unutar svake opcije, ispisuje se naziv boje izabranog vozila, koristeći $boje_vozila[$i]->getNaziv(). -->
    <?php
    }
    ?>
</select>