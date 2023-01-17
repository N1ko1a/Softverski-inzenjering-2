<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Polovnjaci</title>
</head>

<body>
    <header>
        <a href="/"><img src="slike/logo.jpg" alt="Logo polovnjaci RTSI"></a>
        <nav>
            <ul>
                <li>
                    <a href="login.php">
                        <?php 
                        if (isset($_SESSION["auth"]))
                            echo "ODJAVI SE";
                        else
                            echo "PRIJAVI SE"; ?>
                    </a>
                </li>
                <?php
                if (!isset($_SESSION["auth"])) {
                ?>
                <li>
                    <a href="register.php">REGISTRUJ SE</a>
                </li>
                <li>
                    <a href="login.php">POSTAVI OGLAS</a>
                </li>
                <?php
                } else {
                ?>
                <li>
                    <a href="automobili.php">POSTAVI OGLAS</a>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <form class="pretraga" action="index.php">
        <select name="marka">
            <option value="" disabled selected hidden>Marka vozila</option>
            <?php
            include_once("Database_operacije.php");
            $marke = Database_operacije::get_instance()->get_specifikacija_list(new Marka());
            for ($i = 0; $i < count($marke); $i++) {
            ?>
                <option value="<?php echo $marke[$i]->get_id(); ?>"><?php echo $marke[$i]->getNaziv(); ?></option>
            <?php
            }
            ?>
        </select>
        <input type="text" name="model" placeholder="Model">
        <div class="splitter">
            <input type="number" name="cenaod" placeholder="Cena od">
            <input type="number" name="cenado" placeholder="Do">
        </div>
        <select name="karoserija">
            <option value="" disabled selected hidden>Karoserija</option>
            <?php
            include_once("Database_operacije.php");
            $list = Database_operacije::get_instance()->get_specifikacija_list(new Karoserija());
            for ($i = 0; $i < count($list); $i++) {
            ?>
                <option value="<?php echo $list[$i]->get_id(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
            <?php
            }
            ?>
        </select>
        <div class="splitter">
            <input type="number" name="godisteod" placeholder="Godiste od">
            <input type="number" name="godistedo" placeholder="Do">
        </div>
        <select name="vrsta_goriva">
            <option value="" disabled selected hidden>Gorivo</option>
            <?php
            include_once("Database_operacije.php");
            $list = Database_operacije::get_instance()->get_specifikacija_list(new Vrsta_goriva());
            for ($i = 0; $i < count($list); $i++) {
            ?>
                <option value="<?php echo $list[$i]->get_id(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
            <?php
            }
            ?>
        </select>
        <input type="text" name="kilometraza" placeholder="Kilometraza do" >
        <select name="boja_vozila">
            <option value="" disabled selected hidden>Boja vozila</option>
            <?php
            include_once("Database_operacije.php");
            $list = Database_operacije::get_instance()->get_specifikacija_list(new Boja_vozila());
            for ($i = 0; $i < count($list); $i++) {
            ?>
                <option value="<?php echo $list[$i]->get_id(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
            <?php
            }
            ?>
        </select>
        <select name="vrsta_prenosa">
            <option value="" disabled selected hidden>Vrsta prenosa</option>
            <?php
            include_once("Database_operacije.php");
            $list = Database_operacije::get_instance()->get_specifikacija_list(new Vrsta_prenosa());
            for ($i = 0; $i < count($list); $i++) {
            ?>
                <option value="<?php echo $list[$i]->get_id(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
            <?php
            }
            ?>
            <!-- <option value="automatik">Automatik</option>
                <option value="manuelni">Manuelni</option> -->
        </select>
        <select name="broj_vrata">
            <option value="" disabled selected hidden>Broj vrata</option>
            <?php
            include_once("Database_operacije.php");
            $list = Database_operacije::get_instance()->get_specifikacija_list(new Broj_vrata());
            for ($i = 0; $i < count($list); $i++) {
            ?>
                <option value="<?php echo $list[$i]->get_id(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
            <?php
            }
            ?>
            <!-- <option value="automatik">Automatik</option>
                <option value="manuelni">Manuelni</option> -->
        </select>
        <select name="broj_sedista">
            <option value="" disabled selected hidden>Broj sedista</option>
            <?php
            include_once("Database_operacije.php");
            $list = Database_operacije::get_instance()->get_specifikacija_list(new Broj_sedista());
            for ($i = 0; $i < count($list); $i++) {
            ?>
                <option value="<?php echo $list[$i]->get_id(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
            <?php
            }
            ?>
            <!-- <option value="automatik">Automatik</option>
                <option value="manuelni">Manuelni</option> -->
        </select>
        <select name="emisiona_klasa_motora">
            <option value="" disabled selected hidden>Emisiona klasa motora</option>
            <?php
            include_once("Database_operacije.php");
            $list = Database_operacije::get_instance()->get_specifikacija_list(new Emisiona_klasa_motora());
            for ($i = 0; $i < count($list); $i++) {
            ?>
                <option value="<?php echo $list[$i]->get_id(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
            <?php
            }
            ?>
            <!-- <option value="automatik">Automatik</option>
                <option value="manuelni">Manuelni</option> -->
        </select>
        <select name="klima">
            <option value="" disabled selected hidden>Klima</option>
            <?php
            include_once("Database_operacije.php");
            $list = Database_operacije::get_instance()->get_specifikacija_list(new Klima());
            for ($i = 0; $i < count($list); $i++) {
            ?>
                <option value="<?php echo $list[$i]->get_id(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
            <?php
            }
            ?>
            <!-- <option value="automatik">Automatik</option>
                <option value="manuelni">Manuelni</option> -->
        </select>
        <select name="poreklo_vozila">
            <option value="" disabled selected hidden>Poreklo vozila</option>
            <?php
            include_once("Database_operacije.php");
            $list = Database_operacije::get_instance()->get_specifikacija_list(new Poreklo_vozila());
            for ($i = 0; $i < count($list); $i++) {
            ?>
                <option value="<?php echo $list[$i]->get_id(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
            <?php
            }
            ?>
            <!-- <option value="automatik">Automatik</option>
                <option value="manuelni">Manuelni</option> -->
        </select>
        <select name="vrsta_pogona">
            <option value="" disabled selected hidden>Vrsta pogona</option>
            <?php
            include_once("Database_operacije.php");
            $list = Database_operacije::get_instance()->get_specifikacija_list(new Vrsta_pogona());
            for ($i = 0; $i < count($list); $i++) {
            ?>
                <option value="<?php echo $list[$i]->get_id(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
            <?php
            }
            ?>
            <!-- <option value="automatik">Automatik</option>
                <option value="manuelni">Manuelni</option> -->
        </select>
        <button class="pretrazi">PRETRAZI</button>
    </form>

    <div class="naj2">
        <h2>NAJNOVIJI OGLASI</h2>
    </div>
    <div class="naj2-oglasi">
        <?php
        include_once("Database_operacije.php");
        $list = Database_operacije::get_instance()->get_oglas_list();
        for ($i = 0; $i < count($list); $i++) {
            $oglas = $list[$i];
            if ($oglas->getAktivan() == 0) continue;
            if (isset($_GET["marka"]) && $_GET["marka"] != "") {
                if ($oglas->getMarka()->get_id() != intval($_GET["marka"]))
                    continue;
            }

            if (isset($_GET["model"]) && $_GET["model"] != "") {
                if (substr(strtolower($oglas->getModel()), 0, strlen($_GET["model"])) != strtolower($_GET["model"])) {
                    similar_text(strtolower($oglas->getModel()), strtolower($_GET["model"]), $slicnost);
                    // echo $slicnost . " ";
                    if ($slicnost < 30)
                        continue;
                }
            }

            if (isset($_GET["cenaod"]) && $_GET["cenaod"] != "") 
                if ($oglas->getCena() < intval($_GET["cenaod"]))
                    continue;
            

            if (isset($_GET["cenado"]) && $_GET["cenado"] != "") 
                if ($oglas->getCena() > intval($_GET["cenado"]))
                    continue;
            

            if (isset($_GET["karoserija"]) && $_GET["karoserija"] != "") 
                if ($oglas->getKaroserija()->get_id() != intval($_GET["karoserija"]))
                    continue;
            

            if (isset($_GET["godisteod"]) && $_GET["godisteod"] != "") 
                if ($oglas->getGodina_proizvodnje() < intval($_GET["godisteod"]))
                    continue;
            

            if (isset($_GET["godistedo"]) && $_GET["godistedo"] != "") 
                if ($oglas->getGodina_proizvodnje() > intval($_GET["godistedo"]))
                    continue;
            

            if (isset($_GET["vrsta_goriva"]) && $_GET["vrsta_goriva"] != "") 
                if ($oglas->getVrsta_goriva()->get_id() != intval($_GET["vrsta_goriva"]))
                    continue;
            

            if (isset($_GET["kilometraza"]) && $_GET["kilometraza"] != "") 
                if ($oglas->getPredjena_kilometraza() > doubleval($_GET["kilometraza"]))
                    continue;
            

            if (isset($_GET["boja_vozila"]) && $_GET["boja_vozila"] != "") 
                if ($oglas->getBoja()->get_id() != intval($_GET["boja_vozila"]))
                    continue;
            

            if (isset($_GET["vrsta_prenosa"]) && $_GET["vrsta_prenosa"] != "") 
                if ($oglas->getVrsta_prenosa()->get_id() != intval($_GET["vrsta_prenosa"]))
                    continue;
            

            if (isset($_GET["vrsta_prenosa"]) && $_GET["vrsta_prenosa"] != "") 
                if ($oglas->getVrsta_prenosa()->get_id() != intval($_GET["vrsta_prenosa"]))
                    continue;
            

            if (isset($_GET["broj_vrata"]) && $_GET["broj_vrata"] != "") 
                if ($oglas->getBroj_vrata()->get_id() != intval($_GET["broj_vrata"]))
                    continue;
            

            if (isset($_GET["broj_sedista"]) && $_GET["broj_sedista"] != "") 
                if ($oglas->getBroj_sedista()->get_id() != intval($_GET["broj_sedista"]))
                    continue;
            

            if (isset($_GET["emisiona_klasa_motora"]) && $_GET["emisiona_klasa_motora"] != "") 
                if ($oglas->getEmisiona_klasa_motora()->get_id() != intval($_GET["emisiona_klasa_motora"]))
                    continue;
            

            if (isset($_GET["klima"]) && $_GET["klima"] != "") 
                if ($oglas->getKlima()->get_id() != intval($_GET["klima"]))
                    continue;
            

            if (isset($_GET["poreklo_vozila"]) && $_GET["poreklo_vozila"] != "") 
                if ($oglas->getPoreklo_vozila()->get_id() != intval($_GET["poreklo_vozila"]))
                    continue;
            

            if (isset($_GET["vrsta_pogona"]) && $_GET["vrsta_pogona"] != "") 
                if ($oglas->getVrsta_pogona()->get_id() != intval($_GET["vrsta_pogona"]))
                    continue;
            

            $imgPath = "slike/" . $oglas->getFotografije() . "/";
            $dir = scandir($imgPath);
            $img = $imgPath . $dir[2];
        ?>
            <div class="oglas">
                <img src="<?php echo $img ?>" alt="nema">
                <p><?php echo $oglas->getModel(); ?></p>
                <p><?php echo $oglas->getCena(); ?>e</p>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>