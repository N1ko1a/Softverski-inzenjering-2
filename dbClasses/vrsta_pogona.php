<?php
include_once("specifikacija.php");
class VrstaPogona extends Specifikacija {	/**
	 * @return string
	 */
	public function nazivTabele(): string {
        return "vrsta_pogona";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneId(): string {
		return "id_pogona";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneNaziv(): string {
		return "naziv";
	}
}
?>