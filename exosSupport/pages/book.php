<?php
    include_once('classes/Livre.php');

    $livre = Livre::construct("La symphonie des monstres");
?>


<section>
    <h1>Le livre qui vient d'être créé est "<?= $livre->getTitre() ?>" avec l'id <?= $livre->getId() ?></h1>
</section>