<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Register_input_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Ime_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Prezime_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Username_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Password_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Password_ponovljeni_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Email_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Telefon_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Postojeci_nalog_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Database_operacije.php';

class Register {


    /**
     * Proverava inpute, vraca true ako je uspesno registrovan korisnik
     * vraca false ako nije
     * @param array $input
     * @return bool
     */
    public function register(array $input): bool {

        $input_handler = new Register_input_handler();
        $input_handler
        ->set_next_handler(new Ime_handler())
        ->set_next_handler(new Prezime_handler())
        ->set_next_handler(new Username_handler())
        ->set_next_handler(new Password_handler())
        ->set_next_handler(new Password_ponovljeni_handler())
        ->set_next_handler(new Email_handler())
        ->set_next_handler(new Telefon_handler())
        ->set_next_handler(new Postojeci_nalog_handler());

        if (!$input_handler->process($input))
            return false;
        
        Database_operacije::get_instance()->napravi_nalog($input["ime"], $input["prezime"], $input["username"], $input["password"], $input["telefon"], $input["email"]);

        return true;

    }

}