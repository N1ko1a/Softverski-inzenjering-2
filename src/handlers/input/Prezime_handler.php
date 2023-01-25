<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Input_handler.php';

/**
 * Proverava prezime za ilegalne karaktere i duzinu
 */
class Prezime_handler implements Input_handler
{

	private ?Input_handler $next_handler = null;

	/**
	 * @param Input_handler $handler
	 * @return Input_handler
	 */
	public function set_next_handler(Input_handler $handler): Input_handler
	{
		$this->next_handler = $handler;
		return $handler;
	}

	/**
	 *
	 * @param array $input
	 * @return bool
	 */
	public function process(array $input): bool
	{

		if (preg_match('/^[A-Za-z]{3,40}$/', $input["prezime"]) == 0)
        	return false;

		if (is_null($this->next_handler))
			return true;

		return $this->next_handler->process($input);
		
	}
}
