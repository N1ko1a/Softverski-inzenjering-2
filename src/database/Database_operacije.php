<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../config/dbconfig.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../config/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Oglas.php";

// require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Specifikacija.php';
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Boja_vozila.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Broj_sedista.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Broj_vrata.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Emisiona_klasa_motora.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Karoserija.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Klima.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Korisnik.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Marka.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Poreklo_vozila.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Vrsta_goriva.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Vrsta_pogona.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Vrsta_prenosa.php";

class Database_operacije
{

    private static $instance = null;

    private function __construct()
    {
    }

    /**
     * Sigleton pattern, ne zelimo da postoji vise objekata
     * klase koje interakuju sa bazom zbog sigurnosti
     * @return Database_operacije
     */
    public static function get_instance(): Database_operacije
    {
        if (self::$instance == null) {
            self::$instance = new Database_operacije();
        }

        return self::$instance;
    }

    /**
     * Pravi konekciju sa bazom i vraca je
     * @return mysqli
     */
    private function connect(): mysqli
    {
        $conn = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        if ($conn->connect_error) {
            die("Neuspesna konekcija " . $conn->connect_error);
        }
        return $conn;
    }

    /**
     * Uklanja specifikaciju iz baze
     * @param Specifikacija $spec
     * @return void
     */
    public function ukloni_specifikaciju(Specifikacija $spec)
    {
        $sql = "DELETE FROM " . $spec->naziv_tabele() . " WHERE " . $spec->naziv_kolone_id() . "=" . $spec->get_id();
        $conn = $this->connect();

        $conn->query($sql);
    }

    /**
     * Izmenjuje naziv specifikacije u bazi
     * @param Specifikacija $spec
     * @return void
     */
    public function izmeni_naziv_specifikacije(Specifikacija $spec, string $noviNaziv)
    {
        $sql = "UPDATE " . $spec->naziv_tabele() . " 
                SET " . $spec->naziv_kolone_naziv() . "='" . $noviNaziv . "' 
                WHERE " . $spec->naziv_kolone_id() . "=" . $spec->get_id();
        $conn = $this->connect();

        $conn->query($sql);
    }


    /**
     * Vraca niz svih specifikacija
     * @param Specifikacija $spec
     * @return array
     */
    public function get_specifikacija_list(Specifikacija $spec): array
    {
        $sql = "SELECT * FROM " . $spec->naziv_tabele();
        $conn = $this->connect();

        $arr = array();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($i = $result->fetch_assoc()) {
                array_push($arr, new $spec(intval($i[$spec->naziv_kolone_id()]), $i[$spec->naziv_kolone_naziv()]));
            }
        }

        $conn->close();

        return $arr;
    }

    /**
     * Na osnovu pojedine specifikacije i id-a, vraca objekat klase specifikacije
     * iz baze sa istim ID-om
     * @param Specifikacija $spec
     * @param int $id
     * @return Specifikacija
     */
    public function get_specifikacija(Specifikacija $spec, int $id): Specifikacija
    {
        $sql = "SELECT * FROM " . $spec->naziv_tabele() . " WHERE " . $spec->naziv_kolone_id() . "=$id";
        $conn = $this->connect();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = $result->fetch_assoc();
            $conn->close();
            return new $spec($id, $i[$spec->naziv_kolone_naziv()]);
        }
        return new $spec();
    }

    /**
     * Na osnovu id-a vraca objekat klase korisnika dobijen iz baze
     * @param int $id
     * @return Korisnik
     */
    public function get_korisnik(int $id): Korisnik
    {
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
     * Na osnovu username-a vraca objekat klase korisnika dobijen iz baze
     * vraca korisnika sa id -1 ako nije pronadjen
     * @param string $username
     * @return Korisnik
     */
    public function get_korisnik_po_username(string $username): Korisnik
    {
        $sql = "SELECT * FROM korisnik WHERE username='$username'";
        $conn = $this->connect();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = $result->fetch_assoc();
            return new Korisnik($i["id_korisnika"], $i["ime"], $i["prezime"], $i["username"], $i["sifra"], $i["rola"], $i["telefon"], $i["email"], $i["verifikovan"]);
        }

        return new Korisnik();
    }

    /**
     * Na osnovu emaila-a vraca objekat klase korisnika dobijen iz baze
     * vraca korisnika sa id -1 ako nije pronadjen
     * @param string $mail
     * @return Korisnik
     */
    public function get_korisnik_po_mail(string $mail): Korisnik
    {
        $sql = "SELECT * FROM korisnik WHERE email='$mail'";
        $conn = $this->connect();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = $result->fetch_assoc();
            return new Korisnik($i["id_korisnika"], $i["ime"], $i["prezime"], $i["username"], $i["sifra"], $i["rola"], $i["telefon"], $i["email"], $i["verifikovan"]);
        }

        return new Korisnik();
    }

    /**
     * Vraca niz popunjen svim objektima Oglas iz baze
     * @return array
     */
    public function get_oglas_list(): array
    {
        $sql = "SELECT * FROM oglas ORDER BY datum_postavke DESC";
        $conn = $this->connect();

        $arr = array();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($i = $result->fetch_assoc()) {
                $id_oglasa = $i["id_oglasa"];
                $vlasnik = $this->get_korisnik($i["vlasnik"]);
                $marka = $this->get_specifikacija(new Marka(), $i["marka"]);
                $model = $i["model"];
                $godina_proizvodnje = $i["godina_proizvodnje"];
                $cena = $i["cena"];
                $karoserija = $this->get_specifikacija(new Karoserija(), $i["karoserija"]);
                $zapremina_motora = $i["zapremina_motora(ccm)"];
                $snaga_motora = $i["snaga_motora(kw)"];
                $emisiona_klasa_motora = $this->get_specifikacija(new Emisiona_klasa_motora(), $i["emisiona_klasa_motora"]);
                $klima = $this->get_specifikacija(new Klima(), $i["klima"]);
                $predjena_kilometraza = $i["predjena_kilometraza"];
                $broj_sedista = $this->get_specifikacija(new Broj_sedista(), $i["broj_sedista"]);
                $broj_vrata = $this->get_specifikacija(new Broj_vrata(), $i["broj_vrata"]);
                $boja = $this->get_specifikacija(new Boja_vozila(), $i["boja"]);
                $poreklo_vozila = $this->get_specifikacija(new Poreklo_vozila(), $i["poreklo_vozila"]);
                $fotografije = $i["fotografije"];
                $vrsta_goriva = $this->get_specifikacija(new Vrsta_goriva(), $i["vrsta_goriva"]);
                $vrsta_prenosa = $this->get_specifikacija(new Vrsta_prenosa(), $i["vrsta_prenosa"]);
                $vrsta_pogona = $this->get_specifikacija(new Vrsta_pogona(), $i["vrsta_pogona"]);
                $datum_postavke = new DateTime($i["datum_postavke"]);
                $opis_automobila = $i["opis_automobila"];
                $aktivan = $i["aktivan"];

                array_push($arr, new Oglas($id_oglasa, $vlasnik, $marka, $model, $godina_proizvodnje, $cena, $karoserija, $zapremina_motora, $snaga_motora, $emisiona_klasa_motora, $klima, $predjena_kilometraza, $broj_sedista, $broj_vrata, $boja, $poreklo_vozila, $fotografije, $vrsta_goriva, $vrsta_prenosa, $vrsta_pogona, $datum_postavke, $opis_automobila, $aktivan));
            }
        }

        $conn->close();

        return $arr;
    }

    /**
     * Menja lozinku korisnika sa odredjenim id-om
     * @param int $id
     * @param string $pwd
     * @return bool
     */
    public function izmeni_lozinku(int $id, string $pwd): bool
    {
        $enc = password_hash($pwd, PASSWORD_BCRYPT, ["cost" => BCRYPTCOST]);

        $sql = "UPDATE korisnik SET sifra='$enc' WHERE id_korisnika=$id";

        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();

        return true;
    }


    /**
     * Na osnovu username i pwd vraca korisnika sa tim id-om u bazi
     * vraca -1 ako nije pronadjen korisnik ili nije tacna lozinka
     * @param string $username
     * @param string $pwd
     * @return int
     */
    public function proveri_kredencijale(string $username, string $pwd): int
    {

        $pronadjen = $this->get_korisnik_po_username($username);

        if ($pronadjen->get_id() == -1)
            return -1;

        if (!password_verify($pwd, $pronadjen->get_sifra()))
            return -1;

        return $pronadjen->get_id();
    }


    /**
     * Pravi nalog u bazi sa datim kredencijalima
     * @param string $ime
     * @param string $prezime
     * @param string $username
     * @param string $sifra
     * @param string $telefon
     * @param string $email
     * @return void
     */
    public function napravi_nalog(string $ime, string $prezime, string $username, string $sifra, string $telefon, string $email) {

        $enc = password_hash($sifra, PASSWORD_BCRYPT, ["cost" => BCRYPTCOST]);

        $sql = "INSERT INTO korisnik (ime, prezime, username, sifra, rola, telefon, email, verifikovan) VALUES ('$ime', '$prezime', '$username', '$enc', 0, '$telefon', '$email', 0)";

        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();
    }
}
