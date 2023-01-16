<?php
// include_once("specifikacija.php");
class Klima extends Specifikacija {	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "klima";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_klime";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "vrsta";
	}
}
?>