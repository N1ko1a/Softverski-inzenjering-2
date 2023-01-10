<?php
include_once("specifikacija.php");
class EmisionaKlasaMotora extends Specifikacija {	/**
	 * @return string
	 */
	public function nazivTabele(): string {
        return "emisiona_klasa_motora";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneId(): string {
		return "id_klase";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneNaziv(): string {
		return "naziv";
	}
}
?>