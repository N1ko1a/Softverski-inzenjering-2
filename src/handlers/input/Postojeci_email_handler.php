<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/handlers/input/Input_handler.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../src/database/Database_operacije.php';

/**
 * Proverava da li postoji nalog sa datim e-mail ili username
 * cuva rezultate u $GLOBALS['postoji_korisnik_username']
 * i $GLOBALS['postoji_korisnik_email']
 */
class Postojeci_email_handler implements Input_handler
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

        $korisnik = Database_operacije::get_instance()->get_korisnik_po_mail($input["email"]);

        if ($korisnik->get_id() != -1)
            $GLOBALS["postoji_korisnik_email"] = true;

		if ($GLOBALS["postoji_korisnik_email"])
			return false;

		if (is_null($this->next_handler))
			return true;

		return $this->next_handler->process($input);

	}
}
