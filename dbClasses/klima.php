<?php
include_once("specifikacija.php");
class Klima extends Specifikacija {	/**
	 * @return string
	 */
	public function nazivTabele(): string {
        return "klima";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneId(): string {
		return "id_klime";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneNaziv(): string {
		return "vrsta";
	}
}
?>