<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Sacuvana_pretraga.php";

/**
 * Adapter pattern, pretvara
 * klasu Sacuvana_pretraga u string href-a
 */
class Pretraga_u_href {

    private Sacuvana_pretraga $pretraga;

    public function __construct(Sacuvana_pretraga $pretraga) {
        $this->pretraga = $pretraga;
    }

    public function get_href() {
        
        // ?marka=5&model=fds&cenaod=124&cenado=124&karoserija=3&godisteod=512&godistedo=512&vrsta_goriva=4&kilometraza=512&boja_vozila=3&vrsta_prenosa=3&broj_vrata=2&broj_sedista=3&emisiona_klasa_motora=2&klima=1&poreklo_vozila=2&vrsta_pogona=2

        $str = "index.php?";


        if ($this->pretraga->getMarka() != 0)
            $str .= "marka=" . $this->pretraga->getMarka() . "&";
        
        if ($this->pretraga->getModel() != '')
            $str .= "model=" . $this->pretraga->getModel() . "&";
        
        if ($this->pretraga->getCenaod() != 0)
            $str .= "cenaod=" . $this->pretraga->getCenaod() . "&";

        if ($this->pretraga->getCenado() != 0)
            $str .= "cenado=" . $this->pretraga->getCenado() . "&";

        if ($this->pretraga->getKaroserija() != 0)
            $str .= "karoserija=" . $this->pretraga->getKaroserija() . "&";

        if ($this->pretraga->getGodisteod() != 0)
            $str .= "godisteod=" . $this->pretraga->getKaroserija() . "&";

        if ($this->pretraga->getGodistedo() != 0)
            $str .= "godistedo=" . $this->pretraga->getGodistedo() . "&";

        if ($this->pretraga->getGorivo() != 0)
            $str .= "vrsta_goriva=" . $this->pretraga->getGorivo() . "&";

        if ($this->pretraga->getKilometraza() != 0)
            $str .= "kilometraza=" . $this->pretraga->getKilometraza() . "&";

        if ($this->pretraga->getBoja() != 0)
            $str .= "boja_vozila=" . $this->pretraga->getBoja() . "&";

        if ($this->pretraga->getPrenos() != 0)
            $str .= "vrsta_prenosa=" . $this->pretraga->getPrenos() . "&";

        if ($this->pretraga->getVrata() != 0)
            $str .= "broj_vrata=" . $this->pretraga->getVrata() . "&";

        if ($this->pretraga->getSedista() != 0)
            $str .= "broj_sedista=" . $this->pretraga->getSedista() . "&";
        
        if ($this->pretraga->getKlasa() != 0)
            $str .= "emisiona_klasa_motora=" . $this->pretraga->getKlasa() . "&";

        if ($this->pretraga->getKlima() != 0)
            $str .= "klima=" . $this->pretraga->getKlima() . "&";
        
        if ($this->pretraga->getPoreklo() != 0)
            $str .= "poreklo_vozila=" . $this->pretraga->getPoreklo() . "&";

        if ($this->pretraga->getPogon() != 0)
            $str .= "vrsta_pogona=" . $this->pretraga->getPogon() . "&";

        return $str;

    }

}