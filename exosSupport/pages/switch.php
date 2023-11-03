<?php
    $choice = rand(0, 2);

    switch ($choice) {
        case 0:
            $txt = "Vous êtes l’administrateur du site";
            break;
        case 1:
            $txt = "Vous êtes membre du site";
            break;
        case 2:
            $txt = "Vous êtes gestionnaire du site";
            break;
        default:
            $txt = "Vous êtes gestionnaire du site";
            break; 
    }
?>

<section>
    <h1><?= $txt ?></h1>
</section>