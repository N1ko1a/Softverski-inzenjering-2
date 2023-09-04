<?php
// include_once("specifikacija.php");
class Stanje extends Specifikacija {	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "stanje";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_stanja";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "vrsta";
	}
}
?>