<div class="naj2">
        <h2>NAJNOVIJI OGLASI</h2>
    </div>
    <div class="naj2-oglasi">
        <?php
        for ($i = 0; $i < count($vozila); $i++) {
            $oglas = $vozila[$i];
            
            if ($oglas->getAktivan() == 0) continue;

            if (isset($_GET["marka"]) && $_GET["marka"] != "") {
                if ($oglas->getMarka()->get_id() != intval($_GET["marka"]))
                    continue;
            }

            if (isset($_GET["model"]) && $_GET["model"] != "") {
                if (substr(strtolower($oglas->getModel()), 0, strlen($_GET["model"])) != strtolower($_GET["model"])) {
                    similar_text(strtolower($oglas->getModel()), strtolower($_GET["model"]), $slicnost);
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