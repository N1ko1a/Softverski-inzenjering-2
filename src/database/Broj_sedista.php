<?php
// include_once("specifikacija.php");
class Broj_sedista extends Specifikacija {	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "broj_sedista";
	}
	
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_sedista";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "broj";
	}
}

?>
