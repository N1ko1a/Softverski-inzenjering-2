<?php
abstract class Specifikacija {
    protected int $id;
    protected string $naziv;

    /**
     * @param int $id
     * @param int $naziv
     */
    public function __construct(int $id = -1, string $naziv = "null") {
    	$this->id = $id;
    	$this->naziv = $naziv;
    }

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @return string
	 */
	public function getNaziv(): string {
		return $this->naziv;
	}

	abstract public function nazivTabele(): string;
	abstract public function nazivKoloneId(): string;
	abstract public function nazivKoloneNaziv(): string;
}
?>