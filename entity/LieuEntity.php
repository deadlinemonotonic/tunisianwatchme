<?php

class LieuEntity {

    private $id;
    private $ville;

    function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

}

?>
