<?php
/**
 * Interfejs Oglas_builder za pravljenje oglasa od inputa
 * Builder pattern
 */
interface Oglas_builder {
    public function set_id(int $id): Oglas_builder;
    public function set_vlasnik(int $id_vlasnika): Oglas_builder;
    public function set_marka(int $marka): Oglas_builder;
    public function set_model(string $model): Oglas_builder;
    public function set_godina_proizvodnje(int $godina_proizvodnje): Oglas_builder;
    public function set_cena(float $cena): Oglas_builder;
    public function set_karoserija(int $karoserija): Oglas_builder;
    public function set_zapremina_motora(int $zapremina_motora): Oglas_builder;
    public function set_snaga_motora(int $snaga_motora): Oglas_builder;
    public function set_emisiona_klasa_motora(int $emisiona_klasa_motora): Oglas_builder;
    public function set_klima(int $klima): Oglas_builder;
    public function set_predjena_kilometraza(float $predjena_kilometraza): Oglas_builder;
    public function set_broj_sedista(int $broj_sedista): Oglas_builder;
    public function set_broj_vrata(int $broj_vrata): Oglas_builder;
    public function set_boja(int $boja): Oglas_builder;
    public function set_poreklo_vozila(int $poreklo_vozila): Oglas_builder;
    public function set_fotografije(string $fotografije): Oglas_builder;
    public function set_vrsta_goriva(int $vrsta_goriva): Oglas_builder;
    public function set_vrsta_prenosa(int $vrsta_prenosa): Oglas_builder;
    public function set_vrsta_pogona(int $vrsta_pogona): Oglas_builder;
    public function set_datum_postavke(string $datum_postavke): Oglas_builder;
    public function set_opis_automobila(string $opis_automobila): Oglas_builder;
    public function set_aktivan(bool $aktivan): Oglas_builder;
    public function set_odobren(bool $odobren): Oglas_builder;
    public function build(): Oglas;
}