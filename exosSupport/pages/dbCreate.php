<?php
    include_once('classes/Livre.php');

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

    if($_POST['submit']) {
        $livre = Livre::construct($_POST['title']);
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

    <form method="post" class="row" action="">
        <div class="input-field col s12 m6">
            <input type="text" id="title" required name="title">
            <label for="title">Titre : </label>
        </div>
        <div class="input-field col s12">
            <input type="submit" name="submit" class="waves-effect waves-light btn tc-white pointer" value="Valider">
        </div>
    </form>

    <h1>Liste de livres</h1>
    <ul>
    <?php
        foreach ($mappedLivres as $livre) {
    ?>
        <li>Le livre qui vient d'être créé est "<?= $livre->getTitre() ?>" avec l'id <?= $livre->getId() ?></li>
    <?php
        }
    ?>
    </ul>
</section>