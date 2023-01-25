<?php
class Vrsta_pogona extends Specifikacija {	/**
	 * @return string
	 */
	public function naziv_tabele(): string {
        return "vrsta_pogona";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_id(): string {
		return "id_pogona";
	}
	/**
	 * @return string
	 */
	public function naziv_kolone_naziv(): string {
		return "naziv";
	}
}
?>