<?php
include_once("specifikacija.php");
class BrojSedista extends Specifikacija {	/**
	 * @return string
	 */
	public function nazivTabele(): string {
        return "broj_sedista";
	}
	
	/**
	 * @return string
	 */
	public function nazivKoloneId(): string {
		return "id_sedista";
	}
	/**
	 * @return string
	 */
	public function nazivKoloneNaziv(): string {
		return "broj";
	}
}

?>
