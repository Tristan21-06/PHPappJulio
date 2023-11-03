<?php

use Livre as GlobalLivre;

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

    function flushLivre($livre, $db) {
        $sqlInsert = "INSERT INTO Livre (titre) VALUES ('" . $livre->getTitre() . "')";

        
        try {
            $resStatement = $db->prepare($sqlInsert);
            $resStatement->execute();
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    $host = "localhost";
    $dbname = "bibliotheque";
    $user = "root";
    $password = "Root01++";

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    for ($i = 0; $i < 10; $i++){
        $livre = Livre::construct("Livre $i");
        flushLivre($livre, $db);
    }

    $sqlQuery = "SELECT * FROM Livre";

    $resStatement = $db->prepare($sqlQuery);

    $resStatement->execute();
    $livres = $resStatement->fetchAll();

    $mappedLivres = array();
    foreach ($livres as $livre) {
        $newLivre = new Livre();
        $newLivre->setId($livre['id']);
        $newLivre->setTitre($livre['titre']);
        $mappedLivres[] = $newLivre;
    }

?>

<section>
    <?php
        foreach ($mappedLivres as $livre) {
    ?>
        <h2>Le livre qui vient d'être créé est "<?= $livre->getTitre() ?>" avec l'id <?= $livre->getId() ?></h2>
    <?php
        }
    ?>
</section>