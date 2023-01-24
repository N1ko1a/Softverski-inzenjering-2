<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Input_handler.php';

/**
 * Proverava telefon za validnost
 */
class Telefon_handler implements Input_handler
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

		if (preg_match('/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/', $input["telefon"]) == 0)
        	return false;

		if (is_null($this->next_handler))
			return true;

		return $this->next_handler->process($input);
	}
}
