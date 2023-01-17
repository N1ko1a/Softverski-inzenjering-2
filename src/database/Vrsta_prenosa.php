<?php
class Vrsta_prenosa extends Specifikacija {	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "vrsta_prenosa";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_prenosa";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "naziv";
	}
}
;
?>