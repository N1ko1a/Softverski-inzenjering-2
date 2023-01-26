<div class="ime-oglasa">
    <h2><?php echo $oglas->getModel(); ?></h2>
</div>
<div class="slike">
    <div class="glavna-slika">
        <?php
        $imgPath = "slike/" . $oglas->getFotografije() . "/";
        $dir = scandir($imgPath);
        $img = $imgPath . $dir[2];
        ?>
        <img style="object-fit: contain;" src="<?php echo $img ?>" alt="nema">
    </div>

    <div class="ostale-slike">
        <?php 
        for ($i=3; $i < count($dir); $i++) {
            $img = $imgPath . $dir[$i]; ?>
            <img style="object-fit: contain;" src="<?php echo $img ?>" alt="<?php echo "Slika $oglas->getModel()" ?>">
            <?php
        }
        ?>

    </div>
</div>
<div class="opisi">
    <div class="cena">
        <p><?php echo $oglas->getCena(); ?>€</p>
        <a href="tel:<?php echo $oglas->getVlasnik()->get_telefon(); ?>"><?php echo $oglas->getVlasnik()->get_telefon(); ?></a>
    </div>

    <div class="informacije">
        <p>Marka: <?php echo $oglas->getMarka()->getNaziv(); ?></p>
        <p>Model: <?php echo $oglas->getModel(); ?></p>
        <p>Godina proizvodnje: <?php echo $oglas->getGodina_proizvodnje(); ?></p>
        <p>Karoserija: <?php echo $oglas->getKaroserija()->getNaziv(); ?></p>
        <p>Zapremina motora(ccm): <?php echo $oglas->getZapremina_motora(); ?></p>
        <p>Snaga motora(kW): <?php echo $oglas->getSnaga_motora(); ?></p>
        <p>Emisiona klasa motora: <?php echo $oglas->getEmisiona_klasa_motora()->getNaziv(); ?></p>
        <p>Klima: <?php echo $oglas->getKlima()->getNaziv(); ?></p>
        <p>Predjena kilometraza: <?php echo $oglas->getPredjena_kilometraza(); ?></p>
        <p>Broj sedista: <?php echo $oglas->getBroj_sedista()->getNaziv(); ?></p>
        <p>Broj vrata: <?php echo $oglas->getBroj_vrata()->getNaziv(); ?></p>
        <p>Boja: <?php echo $oglas->getBoja()->getNaziv(); ?></p>
        <p>Poreklo vozila: <?php echo $oglas->getPoreklo_vozila()->getNaziv(); ?></p>
        <p>Vrsta goriva: <?php echo $oglas->getVrsta_goriva()->getNaziv(); ?></p>
        <p>Vrsta prenosa: <?php echo $oglas->getVrsta_prenosa()->getNaziv(); ?></p>
        <p>Vrsta pogona: <?php echo $oglas->getVrsta_pogona()->getNaziv(); ?></p>
        <p>Datum postavke: <?php echo $oglas->getDatum_postavke()->format('d.m.Y'); ?></p>
        <p>Opis: <?php echo $oglas->getOpis_automobila(); ?></p>
    </div>
</div>
<?php
if (isset($_SESSION["auth"]) && ($_SESSION["auth"] == $oglas->getVlasnik()->get_id()) || isset($_SESSION["admin"])) {
?>
<div class="flex justify-content-center">
    <a style="color: red; font-size: 32px; margin: 0 auto; " href="uklonioglas.php?id=<?php echo $oglas->get_id(); ?>">UKLONI OGLAS</a>
</div>
<?php } 
if (isset($_SESSION["admin"])) {
?>
<div class="flex justify-content-center">
    <a style="color: green; font-size: 32px; margin: 0 auto; " href="odobrenje.php?id=<?php echo $oglas->get_id(); ?>">
    <?php
    echo $oglas->getOdobren() ? "POVUCI ODOBRENJE OGLASA" : "ODOBRI OGLAS"; 
    ?>
    </a>
</div>
<?php
}