<?php
include_once("specifikacija.php");
class Karoserija extends Specifikacija {	/**
	 * @return string
	 */
	public function nazivTabele(): string {
        return "karoserija";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneId(): string {
		return "id_karoserije";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneNaziv(): string {
		return "vrsta";
	}
}
?>