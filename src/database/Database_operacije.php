<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../config/dbconfig.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../config/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Oglas.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Oglas_input_builder.php";

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

    public function ukloni_oglas(int $id) {

        $sql = "UPDATE oglas SET aktivan=0 WHERE id_oglasa=$id";
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
     * @return ?Oglas
     */
    public function get_oglas_po_id(int $id): ?Oglas
    {
        $sql = "SELECT * FROM oglas WHERE id_oglasa=$id ORDER BY datum_postavke DESC";
        $conn = $this->connect();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $oglas_input_builder = new Oglas_input_builder();
            $i = $result->fetch_assoc();
            $oglas = $oglas_input_builder->set_id($i["id_oglasa"])
                ->set_vlasnik($i["vlasnik"])
                ->set_marka($i["marka"])
                ->set_model($i["model"])
                ->set_godina_proizvodnje($i["godina_proizvodnje"])
                ->set_cena($i["cena"])
                ->set_karoserija($i["karoserija"])
                ->set_zapremina_motora($i["zapremina_motora(ccm)"])
                ->set_snaga_motora($i["snaga_motora(kw)"])
                ->set_emisiona_klasa_motora($i["emisiona_klasa_motora"])
                ->set_klima($i["klima"])
                ->set_predjena_kilometraza($i["predjena_kilometraza"])
                ->set_broj_sedista($i["broj_sedista"])
                ->set_broj_vrata($i["broj_vrata"])
                ->set_boja($i["boja"])
                ->set_poreklo_vozila($i["poreklo_vozila"])
                ->set_fotografije($i["fotografije"])
                ->set_vrsta_goriva($i["vrsta_goriva"])
                ->set_vrsta_prenosa($i["vrsta_prenosa"])
                ->set_vrsta_pogona($i["vrsta_pogona"])
                ->set_datum_postavke($i["datum_postavke"])
                ->set_opis_automobila($i["opis_automobila"])
                ->set_aktivan($i["aktivan"])
                ->build();

            $conn->close();

            return $oglas;
        }

        $conn->close();

        return null;
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
            $oglas_input_builder = new Oglas_input_builder();
            while ($i = $result->fetch_assoc()) {
                $oglas = $oglas_input_builder->set_id($i["id_oglasa"])
                    ->set_vlasnik($i["vlasnik"])
                    ->set_marka($i["marka"])
                    ->set_model($i["model"])
                    ->set_godina_proizvodnje($i["godina_proizvodnje"])
                    ->set_cena($i["cena"])
                    ->set_karoserija($i["karoserija"])
                    ->set_zapremina_motora($i["zapremina_motora(ccm)"])
                    ->set_snaga_motora($i["snaga_motora(kw)"])
                    ->set_emisiona_klasa_motora($i["emisiona_klasa_motora"])
                    ->set_klima($i["klima"])
                    ->set_predjena_kilometraza($i["predjena_kilometraza"])
                    ->set_broj_sedista($i["broj_sedista"])
                    ->set_broj_vrata($i["broj_vrata"])
                    ->set_boja($i["boja"])
                    ->set_poreklo_vozila($i["poreklo_vozila"])
                    ->set_fotografije($i["fotografije"])
                    ->set_vrsta_goriva($i["vrsta_goriva"])
                    ->set_vrsta_prenosa($i["vrsta_prenosa"])
                    ->set_vrsta_pogona($i["vrsta_pogona"])
                    ->set_datum_postavke($i["datum_postavke"])
                    ->set_opis_automobila($i["opis_automobila"])
                    ->set_aktivan($i["aktivan"])
                    ->build();

                array_push($arr, $oglas);
            }
        }

        $conn->close();

        return $arr;
    }


    /**
     * Dodaje oglas od parametara, vraca id kreiranog oglasa.
     * @param int $vlasnik
     * @param int $marka
     * @param string $model
     * @param int $godina_proizvodnje
     * @param float $cena
     * @param int $karoserija
     * @param int $zapremina_motora
     * @param int $snaga_motora
     * @param int $emisiona_klasa_motora
     * @param int $klima
     * @param float $kilometraza
     * @param int $broj_sedista
     * @param int $broj_vrata
     * @param int $boja
     * @param int $poreklo_vozila
     * @param int $vrsta_goriva
     * @param int $vrsta_prenosa
     * @param int $vrsta_pogona
     * @param string $opis
     * @return int
     */
    public function dodaj_oglas(int $vlasnik, int $marka, string $model, int $godina_proizvodnje, float $cena, int $karoserija, int $zapremina_motora, int $snaga_motora, int $emisiona_klasa_motora, int $klima, float $kilometraza, int $broj_sedista, int $broj_vrata, int $boja, int $poreklo_vozila, int $vrsta_goriva, int $vrsta_prenosa, int $vrsta_pogona, string $opis): int
    {

        $sql = "INSERT INTO oglas (vlasnik, marka, model, godina_proizvodnje, cena, karoserija, `zapremina_motora(ccm)`, `snaga_motora(kw)`, emisiona_klasa_motora, klima, predjena_kilometraza, broj_sedista, broj_vrata, boja, poreklo_vozila, fotografije, vrsta_goriva, vrsta_prenosa, vrsta_pogona, datum_postavke, opis_automobila, aktivan) VALUES 
        ($vlasnik, $marka, '$model', $godina_proizvodnje, $cena, $karoserija, $zapremina_motora, $snaga_motora, $emisiona_klasa_motora, $klima, $kilometraza, $broj_sedista, $broj_vrata, $boja, $poreklo_vozila, '', $vrsta_goriva, $vrsta_prenosa, $vrsta_pogona, NOW(), '$opis', 1)";

        $conn = $this->connect();

        $conn->query($sql);

        $id_oglasa = $conn->insert_id;

        $sql = "UPDATE oglas SET fotografije='$id_oglasa' WHERE id_oglasa=$id_oglasa";

        $conn->query($sql);

        $conn->close();

        return $id_oglasa;
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
    public function napravi_nalog(string $ime, string $prezime, string $username, string $sifra, string $telefon, string $email)
    {

        $enc = password_hash($sifra, PASSWORD_BCRYPT, ["cost" => BCRYPTCOST]);

        $sql = "INSERT INTO korisnik (ime, prezime, username, sifra, rola, telefon, email, verifikovan) VALUES ('$ime', '$prezime', '$username', '$enc', 0, '$telefon', '$email', 0)";

        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();
    }
}
