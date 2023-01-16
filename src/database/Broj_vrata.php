<?php
// include_once("specifikacija.php");
class Broj_vrata extends Specifikacija {	
	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "broj_vrata";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_vrata";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "tip";
	}
}

?>