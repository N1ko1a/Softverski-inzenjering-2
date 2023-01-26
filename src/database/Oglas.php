<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Specifikacija.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Boja_vozila.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Broj_sedista.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Broj_vrata.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Emisiona_klasa_motora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Karoserija.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Klima.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Korisnik.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Marka.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Poreklo_vozila.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Vrsta_goriva.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Vrsta_pogona.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Vrsta_prenosa.php";

class Oglas {

	private int $id_oglasa;
	private Korisnik $vlasnik;
	private Marka $marka;
	private string $model;
	private int $godina_proizvodnje;
	private float $cena;
	private Karoserija $karoserija;	
	private int $zapremina_motora;
	private int $snaga_motora;
	private Emisiona_klasa_motora $emisiona_klasa_motora;
	private Klima $klima;
	private float $predjena_kilometraza;
	private Broj_sedista $broj_sedista;
	private Broj_vrata $broj_vrata;
	private Boja_vozila $boja;
	private Poreklo_vozila $poreklo_vozila;
	private string $fotografije;
	private Vrsta_goriva $vrsta_goriva;
	private Vrsta_prenosa $vrsta_prenosa;
	private Vrsta_pogona $vrsta_pogona;
	private DateTime $datum_postavke;
	private string $opis_automobila;
	private bool $aktivan;
	private bool $odobren;


	/**
	 * @param int $id_oglasa
	 * @param Korisnik $vlasnik
	 * @param Marka $marka
	 * @param string $model
	 * @param int $godina_proizvodnje
	 * @param float $cena
	 * @param Karoserija $karoserija
	 * @param int $zapremina_motora
	 * @param int $snaga_motora
	 * @param Emisiona_klasa_motora $emisiona_klasa_motora
	 * @param Klima $klima
	 * @param float $predjena_kilometraza
	 * @param Broj_sedista $broj_sedista
	 * @param Broj_vrata $broj_vrata
	 * @param Boja_vozila $boja
	 * @param Poreklo_vozila $poreklo_vozila
	 * @param string $fotografije
	 * @param Vrsta_goriva $vrsta_goriva
	 * @param Vrsta_prenosa $vrsta_prenosa
	 * @param Vrsta_pogona $vrsta_pogona
	 * @param DateTime $datum_postavke
	 * @param string $opis_automobila
	 * @param bool $aktivan
	 * @param bool $odobren
	 */
	public function __construct(int $id_oglasa, Korisnik $vlasnik, Marka $marka, string $model, int $godina_proizvodnje, float $cena, Karoserija $karoserija, int $zapremina_motora, int $snaga_motora, Emisiona_klasa_motora $emisiona_klasa_motora, Klima $klima, float $predjena_kilometraza, Broj_sedista $broj_sedista, Broj_vrata $broj_vrata, Boja_vozila $boja, Poreklo_vozila $poreklo_vozila, string $fotografije, Vrsta_goriva $vrsta_goriva, Vrsta_prenosa $vrsta_prenosa, Vrsta_pogona $vrsta_pogona, DateTime $datum_postavke, string $opis_automobila, bool $aktivan, bool $odobren) {
		$this->id_oglasa = $id_oglasa;
		$this->vlasnik = $vlasnik;
		$this->marka = $marka;
		$this->model = $model;
		$this->godina_proizvodnje = $godina_proizvodnje;
		$this->cena = $cena;
		$this->karoserija = $karoserija;
		$this->zapremina_motora = $zapremina_motora;
		$this->snaga_motora = $snaga_motora;
		$this->emisiona_klasa_motora = $emisiona_klasa_motora;
		$this->klima = $klima;
		$this->predjena_kilometraza = $predjena_kilometraza;
		$this->broj_sedista = $broj_sedista;
		$this->broj_vrata = $broj_vrata;
		$this->boja = $boja;
		$this->poreklo_vozila = $poreklo_vozila;
		$this->fotografije = $fotografije;
		$this->vrsta_goriva = $vrsta_goriva;
		$this->vrsta_prenosa = $vrsta_prenosa;
		$this->vrsta_pogona = $vrsta_pogona;
		$this->datum_postavke = $datum_postavke;
		$this->opis_automobila = $opis_automobila;
		$this->aktivan = $aktivan;
		$this->odobren = $odobren;
	}

	/**
	 * @return int
	 */
	public function get_id(): int {
		return $this->id_oglasa;
	}

	/**
	 * @return Korisnik
	 */
	public function getVlasnik(): Korisnik {
		return $this->vlasnik;
	}
	
	/**
	 * @return Marka
	 */
	public function getMarka(): Marka {
		return $this->marka;
	}
	
	/**
	 * @return string
	 */
	public function getModel(): string {
		return $this->model;
	}
	
	/**
	 * @return int
	 */
	public function getGodina_proizvodnje(): int {
		return $this->godina_proizvodnje;
	}
	
	/**
	 * @return float
	 */
	public function getCena(): float {
		return $this->cena;
	}
	
	/**
	 * @return Karoserija
	 */
	public function getKaroserija(): Karoserija {
		return $this->karoserija;
	}
	
	/**
	 * @return int
	 */
	public function getZapremina_motora(): int {
		return $this->zapremina_motora;
	}
	
	/**
	 * @return int
	 */
	public function getSnaga_motora(): int {
		return $this->snaga_motora;
	}
	
	/**
	 * @return Emisiona_klasa_motora
	 */
	public function getEmisiona_klasa_motora(): Emisiona_klasa_motora {
		return $this->emisiona_klasa_motora;
	}
	
	/**
	 * @return Klima
	 */
	public function getKlima(): Klima {
		return $this->klima;
	}
	
	/**
	 * @return float
	 */
	public function getPredjena_kilometraza(): float {
		return $this->predjena_kilometraza;
	}
	
	/**
	 * @return Broj_sedista
	 */
	public function getBroj_sedista(): Broj_sedista {
		return $this->broj_sedista;
	}
	
	/**
	 * @return Broj_vrata
	 */
	public function getBroj_vrata(): Broj_vrata {
		return $this->broj_vrata;
	}
	
	/**
	 * @return Boja_vozila
	 */
	public function getBoja(): Boja_vozila {
		return $this->boja;
	}
	
	/**
	 * @return Poreklo_vozila
	 */
	public function getPoreklo_vozila(): Poreklo_vozila {
		return $this->poreklo_vozila;
	}
	
	/**
	 * @return string
	 */
	public function getFotografije(): string {
		return $this->fotografije;
	}
	
	/**
	 * @return Vrsta_goriva
	 */
	public function getVrsta_goriva(): Vrsta_goriva {
		return $this->vrsta_goriva;
	}
	
	/**
	 * @return Vrsta_prenosa
	 */
	public function getVrsta_prenosa(): Vrsta_prenosa {
		return $this->vrsta_prenosa;
	}
	
	/**
	 * @return Vrsta_pogona
	 */
	public function getVrsta_pogona(): Vrsta_pogona {
		return $this->vrsta_pogona;
	}
	
	/**
	 * @return DateTime
	 */
	public function getDatum_postavke(): DateTime {
		return $this->datum_postavke;
	}
	
	/**
	 * @return string
	 */
	public function getOpis_automobila(): string {
		return $this->opis_automobila;
	}
	
	/**
	 * @return bool
	 */
	public function getAktivan(): bool {
		return $this->aktivan;
	}

	/**
	 * @return bool
	 */
	public function getOdobren(): bool {
		return $this->odobren;
	}
}