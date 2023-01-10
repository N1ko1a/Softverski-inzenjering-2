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
}
?>