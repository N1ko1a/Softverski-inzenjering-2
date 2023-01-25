<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Input_handler.php';

/**
 * Proverava da li su submit, username i password
 * setovani unutar $input
 */
class Login_input_handler implements Input_handler {

    private ?Input_handler $next_handler = null;
    
	/**
	 * @param Input_handler $handler
	 * @return Input_handler
	 */
	public function set_next_handler(Input_handler $handler): Input_handler {
        $this->next_handler = $handler;
        return $handler;
	}
	
	/**
	 *
	 * @param array $input
	 * @return bool
	 */
	public function process(array $input): bool {

		if (!(isset($input["submit"]) && isset($input["username"]) && isset($input["password"])))
			return false;
        
		if (is_null($this->next_handler))
			return true;

		return $this->next_handler->process($input);
	}
}