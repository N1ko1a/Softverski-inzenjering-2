<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Oglas.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Oglas_builder.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Database_operacije.php';

/**
 * Implementacija builder patterna
 */
class Oglas_input_builder implements Oglas_builder {

    private int $id_oglasa;
    private int $id_vlasnika;
    private int $marka;
    private string $model;
    private int $godina_proizvodnje;
    private float $cena;
    private int $karoserija;
    private int $zapremina_motora;
    private int $snaga_motora;
    private int $emisiona_klasa_motora;
    private int $klima;
    private float $predjena_kilometraza;
    private int $broj_sedista;
    private int $broj_vrata;
    private int $boja;
    private int $poreklo_vozila;
    private string $fotografije;
    private int $vrsta_goriva;
    private int $vrsta_prenosa;
    private int $vrsta_pogona;
    private string $datum_postavke;
    private string $opis_automobila;
    private bool $aktivan;
	private bool $odobren;


	/**
	 * @param int $id
	 * @return Oglas_builder
	 */
	public function set_id(int $id): Oglas_builder {
        $this->id_oglasa = $id;
        return $this;
    }
	
	/**
	 *
	 * @param int $id_vlasnika
	 * @return Oglas_builder
	 */
	public function set_vlasnik(int $id_vlasnika): Oglas_builder {
        $this->id_vlasnika = $id_vlasnika;
        return $this;
    }
	
	/**
	 *
	 * @param int $marka
	 * @return Oglas_builder
	 */
	public function set_marka(int $marka): Oglas_builder {
        $this->marka = $marka;
        return $this;
    }
	
	/**
	 *
	 * @param string $model
	 * @return Oglas_builder
	 */
	public function set_model(string $model): Oglas_builder {
        $this->model = $model;
        return $this;
	}
	
	/**
	 *
	 * @param int $godina_proizvodnje
	 * @return Oglas_builder
	 */
	public function set_godina_proizvodnje(int $godina_proizvodnje): Oglas_builder {
        $this->godina_proizvodnje = $godina_proizvodnje;
        return $this;
	}
	
	/**
	 *
	 * @param float $cena
	 * @return Oglas_builder
	 */
	public function set_cena(float $cena): Oglas_builder {
        $this->cena = $cena;
        return $this;
	}

    public function set_karoserija(int $karoserija): Oglas_builder {
        $this->karoserija = $karoserija;
        return $this;
    }
	
	/**
	 *
	 * @param int $zapremina_motora
	 * @return Oglas_builder
	 */
	public function set_zapremina_motora(int $zapremina_motora): Oglas_builder {
        $this->zapremina_motora = $zapremina_motora;
        return $this;
	}
	
	/**
	 *
	 * @param int $snaga_motora
	 * @return Oglas_builder
	 */
	public function set_snaga_motora(int $snaga_motora): Oglas_builder {
        $this->snaga_motora = $snaga_motora;
        return $this;
	}
	
	/**
	 *
	 * @param int $emisiona_klasa_motora
	 * @return Oglas_builder
	 */
	public function set_emisiona_klasa_motora(int $emisiona_klasa_motora): Oglas_builder {
        $this->emisiona_klasa_motora = $emisiona_klasa_motora;
        return $this;
    }
	
	/**
	 *
	 * @param int $klima
	 * @return Oglas_builder
	 */
	public function set_klima(int $klima): Oglas_builder {
        $this->klima = $klima;
        return $this;
    }
	
	/**
	 *
	 * @param float $predjena_kilometraza
	 * @return Oglas_builder
	 */
	public function set_predjena_kilometraza(float $predjena_kilometraza): Oglas_builder {
        $this->predjena_kilometraza = $predjena_kilometraza;
        return $this;
    }
	
	/**
	 *
	 * @param int $broj_sedista
	 * @return Oglas_builder
	 */
	public function set_broj_sedista(int $broj_sedista): Oglas_builder {
        $this->broj_sedista = $broj_sedista;
        return $this;
    }
	
	/**
	 *
	 * @param int $broj_vrata
	 * @return Oglas_builder
	 */
	public function set_broj_vrata(int $broj_vrata): Oglas_builder {
        $this->broj_vrata = $broj_vrata;
        return $this;
	}
	
	/**
	 *
	 * @param int $boja
	 * @return Oglas_builder
	 */
	public function set_boja(int $boja): Oglas_builder {
        $this->boja = $boja;
        return $this;
    }
	
	/**
	 *
	 * @param int $poreklo_vozila
	 * @return Oglas_builder
	 */
	public function set_poreklo_vozila(int $poreklo_vozila): Oglas_builder {
        $this->poreklo_vozila = $poreklo_vozila;
        return $this;
	}
	
	/**
	 *
	 * @param string $fotografije
	 * @return Oglas_builder
	 */
	public function set_fotografije(string $fotografije): Oglas_builder {
        $this->fotografije = $fotografije;
        return $this;
	}
	
	/**
	 *
	 * @param int $vrsta_goriva
	 * @return Oglas_builder
	 */
	public function set_vrsta_goriva(int $vrsta_goriva): Oglas_builder {
        $this->vrsta_goriva = $vrsta_goriva;
        return $this;
	}
	
	/**
	 *
	 * @param int $vrsta_prenosa
	 * @return Oglas_builder
	 */
	public function set_vrsta_prenosa(int $vrsta_prenosa): Oglas_builder {
        $this->vrsta_prenosa = $vrsta_prenosa;
        return $this;
	}
	
	/**
	 *
	 * @param int $vrsta_pogona
	 * @return Oglas_builder
	 */
	public function set_vrsta_pogona(int $vrsta_pogona): Oglas_builder {
        $this->vrsta_pogona = $vrsta_pogona;
        return $this;
	}
	
	/**
	 *
	 * @param string $datum_postavke
	 * @return Oglas_builder
	 */
	public function set_datum_postavke(string $datum_postavke): Oglas_builder {
        $this->datum_postavke = $datum_postavke;
        return $this;
	}
	
	/**
	 *
	 * @param string $opis_automobila
	 * @return Oglas_builder
	 */
	public function set_opis_automobila(string $opis_automobila): Oglas_builder {
        $this->opis_automobila = $opis_automobila;
        return $this;
	}
	
	/**
	 *
	 * @param bool $aktivan
	 * @return Oglas_builder
	 */
	public function set_aktivan(bool $aktivan): Oglas_builder {
        $this->aktivan = $aktivan;
        return $this;
	}

	/**
	 * @param bool $odobren
	 * @return Oglas_builder
	 */
	public function set_odobren(bool $odobren): Oglas_builder {
        $this->odobren = $odobren;
        return $this;
	}
	
	/**
	 * @return Oglas
	 */
	public function build(): Oglas {

        $database_operacije = Database_operacije::get_instance();

        $id_oglasa = $this->id_oglasa;
        $vlasnik = $database_operacije->get_korisnik($this->id_vlasnika);
        $marka = $database_operacije->get_specifikacija(new Marka(), $this->marka);
        $model = $this->model;
        $godina_proizvodnje = $this->godina_proizvodnje;
        $cena = $this->cena;
        $karoserija = $database_operacije->get_specifikacija(new Karoserija(), $this->karoserija);
        $zapremina_motora = $this->zapremina_motora;
        $snaga_motora = $this->snaga_motora;
        $emisiona_klasa_motora = $database_operacije->get_specifikacija(new Emisiona_klasa_motora(), $this->emisiona_klasa_motora);
        $klima = $database_operacije->get_specifikacija(new Klima(), $this->klima);
		$predjena_kilometraza = $this->predjena_kilometraza;
        $broj_sedista = $database_operacije->get_specifikacija(new Broj_sedista(), $this->broj_sedista);
        $broj_vrata = $database_operacije->get_specifikacija(new Broj_vrata(), $this->broj_vrata);
        $boja = $database_operacije->get_specifikacija(new Boja_vozila(), $this->boja);
        $poreklo_vozila = $database_operacije->get_specifikacija(new Poreklo_vozila(), $this->poreklo_vozila);
        $fotografije = $this->fotografije;
        $vrsta_goriva = $database_operacije->get_specifikacija(new Vrsta_goriva(), $this->vrsta_goriva);
        $vrsta_prenosa = $database_operacije->get_specifikacija(new Vrsta_prenosa(), $this->vrsta_prenosa);
        $vrsta_pogona = $database_operacije->get_specifikacija(new Vrsta_pogona(), $this->vrsta_pogona);
        $datum_postavke = new DateTime($this->datum_postavke);
        $opis_automobila = $this->opis_automobila;
		$aktivan = $this->aktivan;
		$odobren = $this->odobren;

        return new Oglas($id_oglasa, $vlasnik, $marka, $model, $godina_proizvodnje, $cena, $karoserija, $zapremina_motora, $snaga_motora, $emisiona_klasa_motora, $klima, $predjena_kilometraza, $broj_sedista, $broj_vrata, $boja, $poreklo_vozila, $fotografije, $vrsta_goriva, $vrsta_prenosa, $vrsta_pogona, $datum_postavke, $opis_automobila, $aktivan, $odobren);
		
	}
}