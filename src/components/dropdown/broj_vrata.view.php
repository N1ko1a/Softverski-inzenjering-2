<select name="broj_vrata">
    <option value="" disabled <?php if (!isset($_GET["broj_vrata"])) echo "selected"; ?> hidden>Broj vrata</option>
    <?php
    //prolazimo kroz niz brojevi vrata
    for ($i = 0; $i < count($brojevi_vrata); $i++) {
    ?>
    <!-- kreiramo option za svaku vrednost redom   -->
        <option 
        <?php
         //isset($_GET["broj_vrata"]): Ovo proverava da li je u URL parametrima prisutan parametar "broj_vrata". isset() je PHP funkcija koja proverava da li data promenljiva ili ključ u asocijativnom nizu postoji i nije prazan
        //$boje_vozila[$i]->get_id()== $_GET["broj_vrata"]: Ovo upoređuje ID vrednost trenutne boje vozila (koja se nalazi u $boje_vozila[$i]) sa vrednošću parametra "broj_vrata" koji je prosleđen u URL.
         if (isset($_GET["broj_vrata"]) && $boje_vozila[$i]->get_id()== $_GET["broj_vrata"]) 
        echo "selected"; ?> 
        value="<?php echo $brojevi_vrata[$i]->get_id(); ?>"><?php echo $brojevi_vrata[$i]->getNaziv(); ?></option>
        <!-- davanje vrednosti opciji 
    value="": Ovde se postavlja vrednost atributa "value" za opciju. Ova vrednost će biti poslata serveru kao deo forme kada korisnik izabere ovu opciju. Vrednost je dobijena pozivanjem metode get_id() na trenutnoj iteraciji niza $brojevi_vrata.

<: Ovde se postavlja tekst koji će biti prikazan korisniku kao tekst opcije. Tekst se dobija pozivanjem metode getNaziv() na trenutnoj iteraciji niza $brojevi_vrata.-->
    <?php
    }
    ?>
</select>