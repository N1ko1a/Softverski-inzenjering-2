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
	public function get_id(): int {
		return $this->id_korisnika;
	}
	
	/**
	 * @return string
	 */
	public function get_ime(): string {
		return $this->ime;
	}
	
	/**
	 * @return string
	 */
	public function get_prezime(): string {
		return $this->prezime;
	}
	
	/**
	 * @return string
	 */
	public function get_username(): string {
		return $this->username;
	}
	
	/**
	 * @return string
	 */
	public function get_sifra(): string {
		return $this->sifra;
	}
	
	/**
	 * @return int
	 */
	public function get_rola(): int {
		return $this->rola;
	}
	
	/**
	 * @return string
	 */
	public function get_telefon(): string {
		return $this->telefon;
	}
	
	/**
	 * @return string
	 */
	public function get_email(): string {
		return $this->email;
	}
	
	/**
	 * @return bool
	 */
	public function get_verifikovan(): bool {
		return $this->verifikovan;
	}

}
?>