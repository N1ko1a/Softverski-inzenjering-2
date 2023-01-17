<?php
/**
 * Interfejs Oglas_builder za pravljenje oglasa od inputa
 */
interface Oglas_builder {
    public function setId(int $id): Oglas_builder;
    public function setVlasnik(Korisnik $korisnik): Oglas_builder;
    public function setMarka(string $marka): Oglas_builder;
    public function setModel(string $model): Oglas_builder;
    public function setGodinaProizvodnje(int $godina_proizvodnje): Oglas_builder;
    public function setCena(float $cena): Oglas_builder;
    public function setZapreminaMotora(int $zapremina_motora): Oglas_builder;
    public function setSnagaMotora(int $snaga_motora): Oglas_builder;
    public function setEmisiona_klasa_motora(int $emisiona_klasa_motora): Oglas_builder;
    public function setKlima(int $klima): Oglas_builder;
    public function setPredjenaKilometraza(float $predjena_kilometraza): Oglas_builder;
    public function setBrojSedisa(int $broj_sedista): Oglas_builder;
    public function setBroj_vrata(int $broj_vrata): Oglas_builder;
    public function setBoja(int $boja): Oglas_builder;
    public function setPoreklo_vozila(int $poreklo_vozila): Oglas_builder;
    public function setFotografije(string $fotografije): Oglas_builder;
    public function setVrsta_goriva(int $vrsta_goriva): Oglas_builder;
    public function setVrsta_prenosa(int $vrsta_prenosa): Oglas_builder;
    public function setVrsta_pogona(int $vrsta_pogona): Oglas_builder;
    public function setDatumPostavke(string $datum_postavke): Oglas_builder;
    public function setOpisAutomobila(string $opis_automobila): Oglas_builder;
    public function setAktivan(bool $aktivan): Oglas_builder;
    public function build(): Oglas;
}