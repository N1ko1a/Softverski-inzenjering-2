<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/oglas/Oglas_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Oglas.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../config/config.php';

class Model_handler implements Oglas_handler
{

	private ?Oglas_handler $next_handler = null;

	/**
	 * @param Oglas_handler $handler
	 */
	public function set_next_handler(Oglas_handler $handler): Oglas_handler
	{
		$this->next_handler = $handler;
		return $handler;
	}

	/**
	 * Uporedjuje tekst sa pretragom, vraca true ako se poklapaju
	 * @param string $tekst
	 * @param string $pretraga
	 * @return bool
	 */
	private function uporedi_tekstove(string $tekst, string $pretraga): bool {

		if (substr(strtolower($tekst), 0, strlen($pretraga)) == strtolower($pretraga))
			return true;
		
		similar_text(strtolower($tekst), strtolower($pretraga), $slicnost);

		if ($slicnost > PRETRAGA_NAJMANJA_SLICNOST)
			return true;

		return false;

	}

	/**
	 * @param Oglas $oglas
	 * @param array $input
	 * @return bool
	 */
	public function process(Oglas $oglas, array $input): bool
	{

		if (isset($input["model"]) && $input["model"] != "" && !$this->uporedi_tekstove($oglas->getModel(), $input["model"]))
			return false;


		if (is_null($this->next_handler))
			return true;

		return $this->next_handler->process($oglas, $input);
		
	}
}
