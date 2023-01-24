<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Login_input_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Username_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Database_operacije.php';

class Login {

    /**
     * Prima niz input, vraca -1 ako je neuspesan login,
     * inace vraca id usera ako je uspesan login
     * @param array $input
     * @return int
     */
    public function login(array $input): int {

        $input_handler = new Login_input_handler();
        $input_handler->set_next_handler(new Username_handler());

        if (!$input_handler->process($input))
            return -1;
        
        $id = Database_operacije::get_instance()->proveri_kredencijale($input["username"], $input["password"]);

        return $id;
        
    }

}