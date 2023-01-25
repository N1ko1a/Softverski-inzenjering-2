<?php
// include_once("specifikacija.php");
class Karoserija extends Specifikacija {	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "karoserija";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_karoserije";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "vrsta";
	}
}
?>