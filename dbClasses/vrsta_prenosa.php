<?php
include_once("specifikacija.php");
class VrstaPrenosa extends Specifikacija {	/**
	 * @return string
	 */
	public function nazivTabele(): string {
        return "vrsta_prenosa";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneId(): string {
		return "id_prenosa";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneNaziv(): string {
		return "naziv";
	}
}
;
?>