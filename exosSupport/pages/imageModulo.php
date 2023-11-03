<?php
    $tabImages = array(3, 8, 144, 152);
?>

<section>
    <form method="post" class="row" action="">
        <div class="input-field col s12 m6">
            <input type="number" id="base_entry" required name="base_entry">
            <label for="base_entry">Nombre d'image par ligne : </label>
        </div>
        <div class="input-field col s12">
            <input type="submit" name="submit" class="waves-effect waves-light btn tc-white pointer" value="Valider">
        </div>
    </form>

    <?php
        if($_POST['submit']){
    ?>

        <h2>Vous souhaitez mettre <?= $_POST['base_entry'] ?> images par ligne</h2>

        <?php foreach ($tabImages as $nbImages) { ?>
            Pour <?= $nbImages ?>, il restera <?= $nbImages%$_POST['base_entry'] ?> images à mettre sur une ligne supplémentaire. <br>
        <?php } ?>

    <?php

        }
    ?>
</section>