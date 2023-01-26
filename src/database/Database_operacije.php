<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../config/dbconfig.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../config/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Oglas.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Oglas_input_builder.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Sacuvana_pretraga.php";

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

        $conn->close();

    }

    public function ukloni_pretragu(int $id) {

        $sql = "DELETE FROM pretrage WHERE id_pretrage=$id";

        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();

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

        $conn->close();

    }

    public function ukloni_oglas(int $id) {

        $sql = "UPDATE oglas SET aktivan=0 WHERE id_oglasa=$id";
        $conn = $this->connect();

        $conn->query($sql);
        
        $conn->close();

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
     * Na osnovu id-a vraca objekat sacuvane pretrage korisnika dobijen iz baze
     * @param int $id
     * @return ?Sacuvana_pretraga
     */
    public function get_pretraga(int $id): ?Sacuvana_pretraga
    {
        $sql = "SELECT * FROM pretrage WHERE id_pretrage=$id";
        $conn = $this->connect();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = $result->fetch_assoc();
            $pretraga = new Sacuvana_pretraga(
                $i["id_pretrage"],
                $i["id_korisnika"],
                $i["id_marke"],
                $i["model"],
                $i["cenaod"],
                $i["cenado"],
                $i["id_karoserije"],
                $i["godisteod"],
                $i["godistedo"],
                $i["kilometrazado"],
                $i["id_goriva"],
                $i["id_boje"],
                $i["id_prenosa"],
                $i["id_vrata"],
                $i["id_sedista"],
                $i["id_klase"],
                $i["id_klime"],
                $i["id_porekla"],
                $i["id_pogona"]
            ); 
            return $pretraga;
        }

        return null;
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
        $sql = "SELECT * FROM korisnik WHERE email=\"$mail\"";
        $conn = $this->connect();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = $result->fetch_assoc();
            return new Korisnik($i["id_korisnika"], $i["ime"], $i["prezime"], $i["username"], $i["sifra"], $i["rola"], $i["telefon"], $i["email"], $i["verifikovan"]);
        }

        return new Korisnik();
    }

    /**
     * Menja role korisnika sa odredjenim ID-om
     * @param int $id
     * @return void
     */
    public function izmeni_role(int $id): void
    {

        // 1 XOR 1 = 0, 0 XOR 1 = 1
        $sql = "UPDATE korisnik SET rola=rola XOR 1 WHERE id_korisnika=$id";
        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();

    }

    /**
     * Menja role korisnika sa odredjenim ID-om
     * @param int $id
     * @return void
     */
    public function izmeni_verifikovan(int $id): void
    {

        // 1 XOR 1 = 0, 0 XOR 1 = 1
        $sql = "UPDATE korisnik SET verifikovan=verifikovan XOR 1 WHERE id_korisnika=$id";
        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();

    }

    /**
     * Menja odobrenje oglasa sa odredjenim ID-om
     * @param int $id
     * @return void
     */
    public function izmeni_odobrenje(int $id): void
    {

        // 1 XOR 1 = 0, 0 XOR 1 = 1
        $sql = "UPDATE oglas SET odobren=odobren XOR 1 WHERE id_oglasa=$id";
        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();

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
                ->set_odobren($i["odobren"])
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
    public function get_korisnik_list(): array
    {
        $sql = "SELECT * FROM korisnik";
        $conn = $this->connect();

        $arr = array();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($i = $result->fetch_assoc()) {
                $korisnik = new Korisnik(
                    $i["id_korisnika"],
                    $i["ime"],
                    $i["prezime"],
                    $i["username"],
                    $i["sifra"],
                    $i["rola"],
                    $i["telefon"],
                    $i["email"],
                    $i["verifikovan"]
                );

                array_push($arr, $korisnik);
            }
        }

        $conn->close();

        return $arr;
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
                    ->set_odobren($i["odobren"])
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
     * Vraca niz popunjen objektima Sacuvana_pretraga iz baze
     * ciji je korisnik $id
     * @return array
     */
    public function get_pretraga_list(int $id): array
    {
        $sql = "SELECT * FROM pretrage WHERE id_korisnika=$id";
        $conn = $this->connect();

        $arr = array();

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($i = $result->fetch_assoc()) {

                $pretraga = new Sacuvana_pretraga(
                    $i["id_pretrage"],
                    $i["id_korisnika"],
                    $i["id_marke"],
                    $i["model"],
                    $i["cenaod"],
                    $i["cenado"],
                    $i["id_karoserije"],
                    $i["godisteod"],
                    $i["godistedo"],
                    $i["kilometrazado"],
                    $i["id_goriva"],
                    $i["id_boje"],
                    $i["id_prenosa"],
                    $i["id_vrata"],
                    $i["id_sedista"],
                    $i["id_klase"],
                    $i["id_klime"],
                    $i["id_porekla"],
                    $i["id_pogona"]
                ); 

                array_push($arr, $pretraga);
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
     * Menja ime korisnika sa odredjenim id-om
     * @param int $id
     * @param string $ime
     * @return bool
     */
    public function izmeni_ime(int $id, string $ime): bool
    {

        $sql = "UPDATE korisnik SET ime='$ime' WHERE id_korisnika=$id";

        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();

        return true;
    }

    /**
     * Menja prezime korisnika sa odredjenim id-om
     * @param int $id
     * @param string $prezime
     * @return bool
     */
    public function izmeni_prezime(int $id, string $prezime): bool
    {

        $sql = "UPDATE korisnik SET prezime='$prezime' WHERE id_korisnika=$id";

        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();

        return true;
    }

    /**
     * Menja username korisnika sa odredjenim id-om
     * @param int $id
     * @param string $username
     * @return bool
     */
    public function izmeni_username(int $id, string $username): bool
    {

        $sql = "UPDATE korisnik SET username='$username' WHERE id_korisnika=$id";

        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();

        return true;
    }

    /**
     * Menja telefon korisnika sa odredjenim id-om
     * @param int $id
     * @param string $telefon
     * @return bool
     */
    public function izmeni_telefon(int $id, string $telefon): bool
    {

        $sql = "UPDATE korisnik SET telefon='$telefon' WHERE id_korisnika=$id";

        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();

        return true;
    }

    /**
     * Menja telefon korisnika sa odredjenim id-om
     * @param int $id
     * @param string $email
     * @return bool
     */
    public function izmeni_email(int $id, string $email): bool
    {

        $sql = "UPDATE korisnik SET email=\"$email\" WHERE id_korisnika=$id";

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

        $sql = "INSERT INTO korisnik (ime, prezime, username, sifra, rola, telefon, email, verifikovan) VALUES ('$ime', '$prezime', '$username', '$enc', 0, '$telefon', \"$email\", 0)";

        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();
    }

    public function dodaj_sacuvanu_pretragu(int $id_korisnika, ?int $id_marke, ?string $model, ?int $cenaod, ?int $cenado, ?int $id_karoserije, ?int $godisteod, ?int $godistedo, ?int $kilometrazado, ?int $id_goriva, ?int $id_boje, ?int $id_prenosa, ?int $id_vrata, ?int $id_sedista, ?int $id_klase, ?int $id_klime, ?int $id_porekla, ?int $id_pogona) {

        $sql = "INSERT INTO pretrage (`id_korisnika`, `id_marke`, `model`, `cenaod`, `cenado`, `id_karoserije`, `godisteod`, `godistedo`, `kilometrazado`, `id_goriva`, `id_boje`, `id_prenosa`, `id_vrata`, `id_sedista`, `id_klase`, `id_klime`, `id_porekla`, `id_pogona`) VALUES ($id_korisnika,$id_marke,'$model',$cenaod,$cenado,$id_karoserije,$godisteod,$godistedo,$kilometrazado,$id_goriva,$id_boje,$id_prenosa,$id_vrata,$id_sedista,$id_klase,$id_klime,$id_porekla,$id_pogona)";

        $conn = $this->connect();

        $conn->query($sql);

        $conn->close();

    }
}
