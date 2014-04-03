<?php

class EvaluationEntity {

    private $note;
    private $idreclamation;
    private $idcitoyen;

    public function getNote() {
        return $this->note;
    }

    public function getIdreclamation() {
        return $this->idreclamation;
    }

    public function getIdcitoyen() {
        return $this->idcitoyen;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function setIdreclamation($idreclamation) {
        $this->idreclamation = $idreclamation;
    }

    public function setIdcitoyen($idcitoyen) {
        $this->idcitoyen = $idcitoyen;
    }

    function __construct() {
        
    }

}

?>
