<?php

class Livre {
    public static int $nbLivres = 0;
    private $id;
    private $titre;

    public function __construct() {
        $this->id = ++self::$nbLivres;
    }

    public static function construct($titre) {
        $livre = new self();
        $livre->setTitre($titre);
        return $livre;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setTitre($titre){
        $this->titre = $titre;
    }

    public function getTitre(){
        return $this->titre;
    }
}

?>