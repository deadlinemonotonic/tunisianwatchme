<?php

class StatEntity{
    private $critere;
    private $valeur;
    
    function __construct($critere, $valeur) {
        $this->critere = $critere;
        $this->valeur = $valeur;
    }

    
    public function getCritere() {
        return $this->critere;
    }

    public function getValeur() {
        return $this->valeur;
    }


    
}

?>