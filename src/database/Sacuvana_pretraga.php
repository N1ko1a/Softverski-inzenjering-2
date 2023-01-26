<?php

class Sacuvana_pretraga {

    private int $id;
    private int $korisnik;
    private int $marka;
    private string $model;
    private int $cenaod;
    private int $cenado;
    private int $karoserija;
    private int $godisteod;
    private int $godistedo;
    private int $kilometraza;
    private int $gorivo;
    private int $boja;
    private int $prenos;
    private int $vrata;
    private int $sedista;
    private int $klasa;
    private int $klima;
    private int $poreklo;
    private int $pogon;

    /**
     * @param int $id
     * @param int $korisnik
     * @param int $marka
     * @param string $model
     * @param int $cenaod
     * @param int $cenado
     * @param int $karoserija
     * @param int $godisteod
     * @param int $godistedo
     * @param int $kilometraza
     * @param int $gorivo
     * @param int $boja
     * @param int $prenos
     * @param int $vrata
     * @param int $sedista
     * @param int $klasa
     * @param int $klima
     * @param int $poreklo
     * @param int $pogon
     */
    public function __construct(int $id, int $korisnik, int $marka, string $model, int $cenaod, int $cenado, int $karoserija, int $godisteod, int $godistedo, int $kilometraza, int $gorivo, int $boja, int $prenos, int $vrata, int $sedista, int $klasa, int $klima, int $poreklo, int $pogon) {
    	$this->id = $id;
    	$this->korisnik = $korisnik;
    	$this->marka = $marka;
    	$this->model = $model;
    	$this->cenaod = $cenaod;
    	$this->cenado = $cenado;
    	$this->karoserija = $karoserija;
    	$this->godisteod = $godisteod;
    	$this->godistedo = $godistedo;
    	$this->kilometraza = $kilometraza;
    	$this->gorivo = $gorivo;
    	$this->boja = $boja;
    	$this->prenos = $prenos;
    	$this->vrata = $vrata;
    	$this->sedista = $sedista;
    	$this->klasa = $klasa;
    	$this->klima = $klima;
    	$this->poreklo = $poreklo;
    	$this->pogon = $pogon;
    }

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @return int
	 */
	public function getKorisnik(): int {
		return $this->korisnik;
	}
	
	/**
	 * @return int
	 */
	public function getMarka(): int {
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
	public function getCenaod(): int {
		return $this->cenaod;
	}
	
	/**
	 * @return int
	 */
	public function getCenado(): int {
		return $this->cenado;
	}
	
	/**
	 * @return int
	 */
	public function getKaroserija(): int {
		return $this->karoserija;
	}
	
	/**
	 * @return int
	 */
	public function getGodisteod(): int {
		return $this->godisteod;
	}
	
	/**
	 * @return int
	 */
	public function getGodistedo(): int {
		return $this->godistedo;
	}
	
	/**
	 * @return int
	 */
	public function getKilometraza(): int {
		return $this->kilometraza;
	}
	
	/**
	 * @return int
	 */
	public function getGorivo(): int {
		return $this->gorivo;
	}
	
	/**
	 * @return int
	 */
	public function getBoja(): int {
		return $this->boja;
	}
	
	/**
	 * @return int
	 */
	public function getPrenos(): int {
		return $this->prenos;
	}
	
	/**
	 * @return int
	 */
	public function getVrata(): int {
		return $this->vrata;
	}
	
	/**
	 * @return int
	 */
	public function getSedista(): int {
		return $this->sedista;
	}
	
	/**
	 * @return int
	 */
	public function getKlasa(): int {
		return $this->klasa;
	}
	
	/**
	 * @return int
	 */
	public function getKlima(): int {
		return $this->klima;
	}
	
	/**
	 * @return int
	 */
	public function getPoreklo(): int {
		return $this->poreklo;
	}
	
	/**
	 * @return int
	 */
	public function getPogon(): int {
		return $this->pogon;
	}
}