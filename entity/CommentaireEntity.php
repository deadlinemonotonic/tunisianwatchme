<?php
include_once 'UtilisateurEntity.php';

class CommentaireEntity{
    private $id;
    private $texte;
    private $user;
    private $date;
    private $idReclamation;

    
    function __construct() {
        
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
    
    public function __toString() {
        return 'Commentaire={'.$this->id.','.$this->texte.'}';
    }

}
?>