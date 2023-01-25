<?php
// require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Specifikacija.php';

class Boja_vozila extends Specifikacija {
    
	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "boja_vozila";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_boje";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "boja";
	}
}
?>