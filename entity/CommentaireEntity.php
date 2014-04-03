<?php
class CommentaireEntity{
    private $id;
    private $texte;
    private $user;
    private $date;
    private $idReclamation;

    
    function __construct($id, $texte, $user, $date, $idReclamation) {
        $this->id = $id;
        $this->texte = $texte;
        $this->user = $user;
        $this->date = $date;
        $this->idReclamation = $idReclamation;
    }
    public function getId() {
        return $this->id;
    }

    public function getTexte() {
        return $this->texte;
    }

    public function getUser() {
        return $this->user;
    }

    public function getDate() {
        return $this->date;
    }

    public function getIdReclamation() {
        return $this->idReclamation;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTexte($texte) {
        $this->texte = $texte;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setIdReclamation($idReclamation) {
        $this->idReclamation = $idReclamation;
    }

}

?>

