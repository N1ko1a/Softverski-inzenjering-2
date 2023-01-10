<?php
include_once("boja_vozila.php");
include_once("broj_sedista.php");
include_once("broj_vrata.php");
include_once("emisiona_klasa_motora.php");
include_once("karoserija.php");
include_once("klima.php");
include_once("korisnik.php");
include_once("marka.php");
include_once("poreklo_vozila.php");
include_once("vrsta_goriva.php");
include_once("vrsta_pogona.php");
include_once("vrsta_prenosa.php");

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
	private EmisionaKlasaMotora $emisiona_klasa_motora;
	private Klima $klima;
	private float $predjena_kilometraza;
	private BrojSedista $broj_sedista;
	private BrojVrata $broj_vrata;
	private BojaVozila $boja;
	private PorekloVozila $poreklo_vozila;
	private string $fotografije;
	private VrstaGoriva $vrsta_goriva;
	private VrstaPrenosa $vrsta_prenosa;
	private VrstaPogona $vrsta_pogona;
	private DateTime $datum_postavke;
	private string $opis_automobila;
	private bool $aktivan;


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
	 * @param EmisionaKlasaMotora $emisiona_klasa_motora
	 * @param Klima $klima
	 * @param float $predjena_kilometraza
	 * @param BrojSedista $broj_sedista
	 * @param BrojVrata $broj_vrata
	 * @param BojaVozila $boja
	 * @param PorekloVozila $poreklo_vozila
	 * @param string $fotografije
	 * @param VrstaGoriva $vrsta_goriva
	 * @param VrstaPrenosa $vrsta_prenosa
	 * @param VrstaPogona $vrsta_pogona
	 * @param DateTime $datum_postavke
	 * @param string $opis_automobila
	 * @param bool $aktivan
	 */
	public function __construct(int $id_oglasa, Korisnik $vlasnik, Marka $marka, string $model, int $godina_proizvodnje, float $cena, Karoserija $karoserija, int $zapremina_motora, int $snaga_motora, EmisionaKlasaMotora $emisiona_klasa_motora, Klima $klima, float $predjena_kilometraza, BrojSedista $broj_sedista, BrojVrata $broj_vrata, BojaVozila $boja, PorekloVozila $poreklo_vozila, string $fotografije, VrstaGoriva $vrsta_goriva, VrstaPrenosa $vrsta_prenosa, VrstaPogona $vrsta_pogona, DateTime $datum_postavke, string $opis_automobila, bool $aktivan) {
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
	}

	/**
	 * @return int
	 */
	public function getId(): int {
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
	 * @return EmisionaKlasaMotora
	 */
	public function getEmisiona_klasa_motora(): EmisionaKlasaMotora {
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
	 * @return BrojSedista
	 */
	public function getBroj_sedista(): BrojSedista {
		return $this->broj_sedista;
	}
	
	/**
	 * @return BrojVrata
	 */
	public function getBroj_vrata(): BrojVrata {
		return $this->broj_vrata;
	}
	
	/**
	 * @return BojaVozila
	 */
	public function getBoja(): BojaVozila {
		return $this->boja;
	}
	
	/**
	 * @return PorekloVozila
	 */
	public function getPoreklo_vozila(): PorekloVozila {
		return $this->poreklo_vozila;
	}
	
	/**
	 * @return string
	 */
	public function getFotografije(): string {
		return $this->fotografije;
	}
	
	/**
	 * @return VrstaGoriva
	 */
	public function getVrsta_goriva(): VrstaGoriva {
		return $this->vrsta_goriva;
	}
	
	/**
	 * @return VrstaPrenosa
	 */
	public function getVrsta_prenosa(): VrstaPrenosa {
		return $this->vrsta_prenosa;
	}
	
	/**
	 * @return VrstaPogona
	 */
	public function getVrsta_pogona(): VrstaPogona {
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
}

?>