<?php
class DomaineEntity{
    private $id;
    private $nom;
    
    function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function __toString() {
        return $this->nom;
    }

}
?>
