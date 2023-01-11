<?php

class Korisnik {
    
    private int $id_korisnika;
    private string $ime;
    private string $prezime;
    private string $username;
    private string $sifra;
    private int $rola;
    private string $telefon;
    private string $email;
    private bool $verifikovan;


    /**
     * @param int $id_korisnika
     * @param string $ime
     * @param string $prezime
     * @param string $username
     * @param string $sifra
     * @param int $rola
     * @param string $telefon
     * @param string $email
     * @param bool $verifikovan
     */
    public function __construct(int $id_korisnika = -1, string $ime = "", string $prezime = "", string $username = "", string $sifra = "", int $rola = 0, string $telefon = "", string $email = "", bool $verifikovan = false) {
    	$this->id_korisnika = $id_korisnika;
    	$this->ime = $ime;
    	$this->prezime = $prezime;
    	$this->username = $username;
    	$this->sifra = $sifra;
    	$this->rola = $rola;
    	$this->telefon = $telefon;
    	$this->email = $email;
    	$this->verifikovan = $verifikovan;
    }

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id_korisnika;
	}
	
	/**
	 * @return string
	 */
	public function getIme(): string {
		return $this->ime;
	}
	
	/**
	 * @return string
	 */
	public function getPrezime(): string {
		return $this->prezime;
	}
	
	/**
	 * @return string
	 */
	public function getUsername(): string {
		return $this->username;
	}
	
	/**
	 * @return string
	 */
	public function getSifra(): string {
		return $this->sifra;
	}
	
	/**
	 * @return int
	 */
	public function getRola(): int {
		return $this->rola;
	}
	
	/**
	 * @return string
	 */
	public function getTelefon(): string {
		return $this->telefon;
	}
	
	/**
	 * @return string
	 */
	public function getEmail(): string {
		return $this->email;
	}
	
	/**
	 * @return bool
	 */
	public function getVerifikovan(): bool {
		return $this->verifikovan;
	}

}
?>