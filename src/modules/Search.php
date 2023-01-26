<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Aktivan_oglas_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Odobren_oglas_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Vlasnik_oglasa_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Boja_vozila_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Broj_sedista_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Broj_vrata_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Cena_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Emisiona_klasa_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Godiste_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Karoserija_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Klima_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Marka_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Model_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Poreklo_vozila_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Vrsta_goriva_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Vrsta_pogona_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Vrsta_prenosa_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Vlasnik_handler.php';

class Search {

    /**
     * Filtrira niz $oglasi po pretrazi iz $inputs
     * @param array $oglasi
     * @param array $inputs
     * @return array
     */
    public function filter_results(array $oglasi, array $inputs): array {

        $arr = array();

        $filter_handler = new Aktivan_oglas_handler();

        $filter_handler
            ->set_next_handler(new Odobren_oglas_handler())
            ->set_next_handler(new Boja_vozila_handler())
            ->set_next_handler(new Broj_sedista_handler())
            ->set_next_handler(new Broj_vrata_handler())
            ->set_next_handler(new Cena_handler())
            ->set_next_handler(new Emisiona_klasa_handler())
            ->set_next_handler(new Godiste_handler())
            ->set_next_handler(new Karoserija_handler())
            ->set_next_handler(new Klima_handler())
            ->set_next_handler(new Marka_handler())
            ->set_next_handler(new Model_handler())
            ->set_next_handler(new Poreklo_vozila_handler())
            ->set_next_handler(new Vrsta_goriva_handler())
            ->set_next_handler(new Vrsta_pogona_handler())
            ->set_next_handler(new Vrsta_prenosa_handler())
            ->set_next_handler(new Vlasnik_handler());

        for ($i=0; $i < count($oglasi); $i++) {
            $oglas = $oglasi[$i];
            if ($filter_handler->process($oglas, $inputs))
                array_push($arr, $oglas);
        }

        return $arr;

    }

    /**
     * Filtrira array, uzima samo neaktivne oglase
     * @param array $oglasi
     * @return array
     */
    public function filter_neaktivne(array $oglasi): array {

        $arr = array();

        $filter_handler = new Aktivan_oglas_handler();

        for ($i=0; $i < count($oglasi); $i++) {
            $oglas = $oglasi[$i];
            if (!$filter_handler->process($oglas, array()))
                array_push($arr, $oglas);
        }

        return $arr;

    }

    /**
     * Filtrira array $oglasi po vlasniku id $id
     * @param array $oglasi
     * @param int $id
     * @return array
     */
    public function filter_vlasnik(array $oglasi, int $id): array {

        $arr = array();

        $filter_handler = new Vlasnik_oglasa_handler();

        for ($i=0; $i < count($oglasi); $i++) {
            $oglas = $oglasi[$i];
            if ($filter_handler->process($oglas, array("vlasnik"=>$id)))
                array_push($arr, $oglas);
        }

        return $arr;

    }

    /**
     * Cuva pretragu po $input korisniku sa id $id
     * @param array $input
     * @param int $id
     * @return void
     */
    public function sacuvaj_pretragu(array $input, int $id) : void {
        
        $marka = isset($input["marka"]) ? intval($input["marka"]) : 0;   
        $model = isset($input["model"]) ? $input["model"] : "";   
        $cenaod = isset($input["cenaod"]) ? intval($input["cenaod"]) : 0;   
        $cenado = isset($input["cenado"]) ? intval($input["cenado"]) : 0;   
        $karoserija = isset($input["karoserija"]) ? intval($input["karoserija"]) : 0;   
        $godisteod = isset($input["godisteod"]) ? intval($input["godisteod"]) : 0;   
        $godistedo = isset($input["godistedo"]) ? intval($input["godistedo"]) : 0;   
        $vrsta_goriva = isset($input["vrsta_goriva"]) ? intval($input["vrsta_goriva"]) : 0;   
        $kilometraza = isset($input["kilometraza"]) ? intval($input["kilometraza"]) : 0;   
        $boja_vozila = isset($input["boja_vozila"]) ? intval($input["boja_vozila"]) : 0;   
        $vrsta_prenosa = isset($input["vrsta_prenosa"]) ? intval($input["vrsta_prenosa"]) : 0;   
        $broj_vrata = isset($input["broj_vrata"]) ? intval($input["broj_vrata"]) : 0;   
        $broj_sedista = isset($input["broj_sedista"]) ? intval($input["broj_sedista"]) : 0;   
        $emisiona_klasa_motora = isset($input["emisiona_klasa_motora"]) ? intval($input["emisiona_klasa_motora"]) : 0;
        $klima = isset($input["klima"]) ? intval($input["klima"]) : 0;   
        $poreklo_vozila = isset($input["poreklo_vozila"]) ? intval($input["poreklo_vozila"]) : 0;   
        $vrsta_pogona = isset($input["vrsta_pogona"]) ? intval($input["vrsta_pogona"]) : 0;
    
        Database_operacije::get_instance()->dodaj_sacuvanu_pretragu($_SESSION["auth"], $marka, $model, $cenaod, $cenado, $karoserija, $godisteod, $godistedo, $kilometraza, $vrsta_goriva, $boja_vozila, $vrsta_prenosa, $broj_vrata, $broj_sedista, $emisiona_klasa_motora, $klima, $poreklo_vozila, $vrsta_pogona);    

    }

}