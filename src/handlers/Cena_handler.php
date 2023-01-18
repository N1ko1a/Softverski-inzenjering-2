<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/Oglas_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Oglas.php';

class Cena_handler implements Oglas_handler
{

	private Oglas_handler $next_handler;

	/**
	 * @param Oglas_handler $handler
	 */
	public function set_next_handler(Oglas_handler $handler): Oglas_handler
	{
		$this->next_handler = $handler;
		return $handler;
	}

	/**
	 * @param Oglas $oglas
	 * @param array $input
	 * @return bool
	 */
	public function process(Oglas $oglas, array $input): bool
	{

		if (isset($input["cenaod"]) && $input["cenaod"] != "" && $oglas->getCena() < intval($input["cenaod"]))
			return false;

		if (isset($input["cenado"]) && $input["cenado"] != "" && $oglas->getCena() > intval($input["cenado"]))
			return false;

		if (is_null($this->next_handler))
			return true;

		return $this->next_handler->process($oglas, $input);
	}
}
