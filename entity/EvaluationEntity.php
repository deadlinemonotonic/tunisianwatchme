<?php

class EvaluationEntity {

    private $note;
    private $reclamation;
    private $citoyen;

    public function getNote() {
        return $this->note;
    }

    public function getreclamation() {
        return $this->reclamation;
    }

    public function getcitoyen() {
        return $this->citoyen;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function setreclamation($reclamation) {
        $this->reclamation = $reclamation;
    }

    public function setIdcitoyen($citoyen) {
        $this->citoyen = $citoyen;
    }

    function __construct() {
        
    }
    
    function __toString() {
        return 'id citoyen:'.$this->citoyen.' id reclamation:'.$this->reclamation.' note:'.$this->note;
    }

}

?>
