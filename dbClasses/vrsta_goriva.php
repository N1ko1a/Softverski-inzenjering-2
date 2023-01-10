<?php
include_once("specifikacija.php");
class VrstaGoriva extends Specifikacija {	/**
	 * @return string
	 */
	public function nazivTabele(): string {
        return "vrsta_goriva";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneId(): string {
		return "id_goriva";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneNaziv(): string {
		return "naziv";
	}
}
?>