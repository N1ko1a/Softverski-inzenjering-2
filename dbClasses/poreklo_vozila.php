<?php
include_once("specifikacija.php");
class PorekloVozila extends Specifikacija {	
	/**
	 * @return string
	 */
	public function nazivTabele(): string {
        return "poreklo_vozila";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneId(): string {
		return "id_porekla";
	}
	
	/**
	 * @return string
	 */
	public function nazivKoloneNaziv(): string {
		return "vrsta";
	}
}
?>