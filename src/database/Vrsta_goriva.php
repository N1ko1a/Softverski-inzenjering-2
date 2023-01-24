<?php
// include_once("specifikacija.php");
class Vrsta_goriva extends Specifikacija {	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "vrsta_goriva";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_goriva";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "naziv";
	}
}
?>