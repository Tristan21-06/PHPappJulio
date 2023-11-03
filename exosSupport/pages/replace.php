<?php 
    $welcomeText = "Bonjour, c’est moi. <br> T’es le bien venu sur mon site.";
    $welcomeTextN = "Bonjour, c’est moi. \n T’es le bien venu sur mon site."; 
    //ne saute pas la ligne car html ne passe à la ligne qu'avec la balise br ou les caractères spéciaux

    $welcomeText = str_replace("moi", "Tristan", $welcomeText);
    $welcomeTextN = str_replace("moi", "Tristan", $welcomeTextN);
?>

<section>
    Avec br
    <h1><?= $welcomeText ?></h1>
    Avec \n
    <h1><?= $welcomeTextN ?></h1>
</section>