<?php
// include_once("specifikacija.php");
class Emisiona_klasa_motora extends Specifikacija {	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "emisiona_klasa_motora";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_klase";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "naziv";
	}
}
?>