<?php
include_once '../entity/UtilisateurEntity.php';
include_once '../entity/ReclamationEntity.php';
$user = new UtilisateurEntity(); 
$Reclamation = new ReclamationEntity();

class CommentaireEntity{
    private $id;
    private $texte;
    private $user;
    private $date;
    private $Reclamation;

    
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

    public function getReclamation() {
        return $this->Reclamation;
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

    public function setReclamation(ReclamationEntity $Reclamation) {
        $this->Reclamation = $Reclamation;
    }
    
    public function __toString() {
        return 'Commentaire={'.$this->id.','.$this->texte.'}';
    }
    

}
?>
