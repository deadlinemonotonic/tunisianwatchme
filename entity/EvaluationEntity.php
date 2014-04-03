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

    public function setIdcitoyen($idcitoyen) {
        $this->citoyen = $citoyen;
    }

    function __construct() {
        
    }

}

?>
