<?php
include_once("specifikacija.php");
class BojaVozila extends Specifikacija {
    
	/**
	 * @return string
	 */
	public function nazivTabele(): string {
        return "boja_vozila";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneId(): string {
		return "id_boje";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneNaziv(): string {
		return "boja";
	}
}
?>