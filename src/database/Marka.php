<?php
// include_once("specifikacija.php");
class Marka extends Specifikacija {	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "marka";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_marke";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "naziv";
	}
}
?>