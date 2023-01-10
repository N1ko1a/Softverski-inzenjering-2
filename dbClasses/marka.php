<?php
include_once("specifikacija.php");
class Marka extends Specifikacija {	/**
	 * @return string
	 */
	public function nazivTabele(): string {
        return "marka";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneId(): string {
		return "id_marke";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneNaziv(): string {
		return "naziv";
	}
}
?>