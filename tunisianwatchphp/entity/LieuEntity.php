<?php

class LieuEntity {

    private $id;
    private $ville;

    function __construct($id, $ville) {
        $this->id = $id;
        $this->ville = $ville;
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
