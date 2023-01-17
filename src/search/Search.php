<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Aktivan_oglas_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Boja_vozila_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Broj_sedista_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Broj_vrata_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Cena_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Emisiona_klasa_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Godiste_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Karoserija_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Klima_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Marka_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Model_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Poreklo_vozila_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Vrsta_goriva_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Vrsta_pogona_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Vrsta_prenosa_handler.php';

class Search {

    public function filter_results(array $oglasi, array $inputs): array {

        $arr = array();

        $filter_handler = new Aktivan_oglas_handler();

        $filter_handler
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
            ->set_next_handler(new Vrsta_prenosa_handler());

        for ($i=0; $i < count($oglasi); $i++) {
            $oglas = $oglasi[$i];
            if ($filter_handler->process($oglas, $inputs) == true)
                array_push($arr, $oglas);
        }

        return $arr;

    }

}