<?php
// include_once("specifikacija.php");
class Poreklo_vozila extends Specifikacija {	
	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "poreklo_vozila";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_porekla";
	}
	
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "vrsta";
	}
}
?>