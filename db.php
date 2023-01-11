<?php
include_once('dbconfig.php');
include_once('./dbClasses/specifikacija.php');
include_once("./dbClasses/boja_vozila.php");
include_once("./dbClasses/broj_sedista.php");
include_once("./dbClasses/broj_vrata.php");
include_once("./dbClasses/emisiona_klasa_motora.php");
include_once("./dbClasses/karoserija.php");
include_once("./dbClasses/klima.php");
include_once("./dbClasses/korisnik.php");
include_once("./dbClasses/marka.php");
include_once("./dbClasses/poreklo_vozila.php");
include_once("./dbClasses/vrsta_goriva.php");
include_once("./dbClasses/vrsta_pogona.php");
include_once("./dbClasses/vrsta_prenosa.php");
include_once("./dbClasses/oglas.php");

class DBOperacije {

    private static $instance = null;

    private function __construct() {}

    // singleton pattern
    /**
	 * @return DBOperacije
	 */
    public static function getInstance(): DBOperacije {
        if (self::$instance == null) {
            self::$instance = new DBOperacije();
        }

        return self::$instance;
    }

    /**
     * @return mysqli
     */
    private function connect(): mysqli {
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        if ($conn->connect_error) {
            die("Neuspesna konekcija " . $conn->connect_error);
        }
        return $conn;
    }

    /**
     * @return void
     */
    public function test() {
        echo "<p>Testiram konekciju...</p>";

        $conn = $this->connect();

        echo "<p style='color: green; text-decoration: underline; font-size: 20px;'>Konekcija radi!</p>";
        echo "<p>Testiram fetch marki automobila...</p>";
        echo "<ul>";

        $niz = $this->getSpecifikacijaList(new Marka());

        for ($i=0; $i < count($niz); $i++) {
            echo "<li>".$niz[$i]->getNaziv() . "</li>";
        }

        echo "</ul>";

        $conn->close();
    }

    /**
     * @param Specifikacija $spec
     * @return void
     */
    public function ukloniSpecifikaciju(Specifikacija $spec) {
        $sql = "DELETE FROM " . $spec->nazivTabele() . " WHERE " . $spec->nazivKoloneId() . "=" . $spec->getId();
        $conn = $this->connect();

        $conn->query($sql);
    }

    /**
     * @param Specifikacija $spec
     * @return void
     */
    public function izmeniNazivSpecifikacije(Specifikacija $spec, string $noviNaziv) {
        $sql = "UPDATE " . $spec->nazivTabele() . " 
                SET " . $spec->nazivKoloneNaziv() . "='" .$noviNaziv . "' 
                WHERE " . $spec->nazivKoloneId() . "=" . $spec->getId();
        $conn = $this->connect();

        $conn->query($sql);
    }


    // funkcija prima bilo koju vrstu specifikacije, i vraca
    // niz sa listom svih specifikacija tog tipa u bazi
    /**
     * @param Specifikacija $spec
     * @return array
     */
    public function getSpecifikacijaList(Specifikacija $spec): array {
        $sql = "SELECT * FROM " . $spec->nazivTabele();
        $conn = $this->connect();

        $arr = array();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($i = $result->fetch_assoc()) {
                // echo $i[$spec->nazivKoloneId()];
                array_push($arr, new $spec(intval($i[$spec->nazivKoloneId()]), $i[$spec->nazivKoloneNaziv()]));
            }
        }

        $conn->close();

        return $arr;
    }

    public function getSpecifikacija(Specifikacija $spec, int $id): Specifikacija {
        $sql = "SELECT * FROM " . $spec->nazivTabele() . " WHERE " . $spec->nazivKoloneId() . "=$id";
        $conn = $this->connect();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = $result->fetch_assoc();
            $conn->close();
            return new $spec($id, $i[$spec->nazivKoloneNaziv()]);
        }
        return new $spec();
    }

    /**
     * @param int $id
     * @return Korisnik
     */
    public function getKorisnik(int $id): Korisnik {
        $sql = "SELECT * FROM korisnik WHERE id_korisnika=$id";
        $conn = $this->connect();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = $result->fetch_assoc();
            return new Korisnik($id, $i["ime"], $i["prezime"], $i["username"], $i["sifra"], $i["rola"], $i["telefon"], $i["email"], $i["verifikovan"]);
        }
        
        return new Korisnik();
    }

    /**
     * @return array
     */
    public function getOglasList(): array {
        $sql = "SELECT * FROM oglas ORDER BY datum_postavke DESC";
        $conn = $this->connect();

        $arr = array();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($i = $result->fetch_assoc()) {
                $id_oglasa = $i["id_oglasa"];
                $vlasnik = $this->getKorisnik($i["vlasnik"]);
                $marka = $this->getSpecifikacija(new Marka(), $i["marka"]);
                $model = $i["model"];
                $godina_proizvodnje = $i["godina_proizvodnje"];
                $cena = $i["cena"];
                $karoserija = $this->getSpecifikacija(new Karoserija(), $i["karoserija"]);
                $zapremina_motora = $i["zapremina_motora(ccm)"];
                $snaga_motora = $i["snaga_motora(kw)"];
                $emisiona_klasa_motora = $this->getSpecifikacija(new EmisionaKlasaMotora(), $i["emisiona_klasa_motora"]);
                $klima = $this->getSpecifikacija(new Klima(), $i["klima"]);
                $predjena_kilometraza = $i["predjena_kilometraza"];
                $broj_sedista = $this->getSpecifikacija(new BrojSedista(), $i["broj_sedista"]);
                $broj_vrata = $this->getSpecifikacija(new BrojVrata(), $i["broj_vrata"]);
                $boja = $this->getSpecifikacija(new BojaVozila(), $i["boja"]);
                $poreklo_vozila = $this->getSpecifikacija(new PorekloVozila(), $i["poreklo_vozila"]);
                $fotografije = $i["fotografije"];
                $vrsta_goriva = $this->getSpecifikacija(new VrstaGoriva(), $i["vrsta_goriva"]);
                $vrsta_prenosa = $this->getSpecifikacija(new VrstaPrenosa(), $i["vrsta_prenosa"]);
                $vrsta_pogona = $this->getSpecifikacija(new VrstaPogona(), $i["vrsta_pogona"]);
                $datum_postavke = new DateTime($i["datum_postavke"]);
                $opis_automobila = $i["opis_automobila"];
                $aktivan = $i["aktivan"];

                array_push($arr, new Oglas($id_oglasa, $vlasnik, $marka, $model, $godina_proizvodnje, $cena, $karoserija, $zapremina_motora, $snaga_motora, $emisiona_klasa_motora, $klima, $predjena_kilometraza, $broj_sedista, $broj_vrata, $boja, $poreklo_vozila, $fotografije, $vrsta_goriva, $vrsta_prenosa, $vrsta_pogona, $datum_postavke, $opis_automobila, $aktivan));
            }
        }

        $conn->close();

        return $arr;
    }

}
?>