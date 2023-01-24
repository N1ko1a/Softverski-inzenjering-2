<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Input_handler.php';

/**
 * Proverava username za ilegalne karaktere i duzinu
 */
class Username_handler implements Input_handler
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

		/* "dezinfekcija" username (prima user.name, user, user1.name2.name3 i slicno)
     	* da ne bi doslo do XSS napada
     	* https://regex101.com/r/O9KdEr/1
     	*/
		$username = filter_var($input["username"], FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9]+(\.?[a-zA-Z0-9]+)*$/")));

		if (strlen($username) == 0)
			return false;
			
    	// limitiramo i duzinu username
		if (strlen($username) > 40)
			return false;

		if (is_null($this->next_handler))
			return true;

		return $this->next_handler->process($input);
	}
}
