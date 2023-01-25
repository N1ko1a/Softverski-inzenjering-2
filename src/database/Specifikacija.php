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
	public function get_id(): int {
		return $this->id;
	}
	
	/**
	 * @return string
	 */
	public function getNaziv(): string {
		return $this->naziv;
	}

	abstract public function naziv_tabele(): string;
	abstract public function naziv_kolone_id(): string;
	abstract public function naziv_kolone_naziv(): string;
}
?>