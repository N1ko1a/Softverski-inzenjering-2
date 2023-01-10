<?php
include_once("specifikacija.php");
class BrojVrata extends Specifikacija {	
	/**
	 * @return string
	 */
	public function nazivTabele(): string {
        return "broj_vrata";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneId(): string {
		return "id_vrata";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneNaziv(): string {
		return "tip";
	}
}

?>