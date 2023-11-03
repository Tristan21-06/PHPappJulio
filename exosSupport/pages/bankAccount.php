<?php

    if(!isset($_SESSION['money'])){
        $_SESSION['money'] = 2000;
    }

    if(!isset($_SESSION['deposits'])){
        $_SESSION['deposits'] = array();
    }

    if(!isset($_SESSION['withdrawals'])){
        $_SESSION['withdrawals'] = array();
    }

    if($_POST['submit']) {
        if($_POST['operation'] == "get"){
            $_SESSION['money'] -= $_POST['base_entry'];
            $_SESSION['withdrawals'][] = $_POST['base_entry'];
        } else if ($_POST['operation'] == "put") {
            $_SESSION['money'] += $_POST['base_entry'];
            $_SESSION['deposits'][] = $_POST['base_entry'];
        }
    }

?>

<section>
    <h1>Votre solde actuel est de <?= $_SESSION['money'] ?></h1>
    <form method="post" class="row" action="">
        <div class="input-field col s12 m6">
            <select name="operation" id="operation" required>
                <option value="" selected disabled> --- </option>
                <option value="get">Retrait</option>
                <option value="put">Dépôt</option>
            </select>
            <label for="currency">Type d'opération : </label>
        </div>
        <div class="input-field col s12 m6">
            <input type="number" id="base_entry" required name="base_entry">
            <label for="base_entry">Argent à retirer/déposer : </label>
        </div>
        <div class="input-field col s12">
            <input type="submit" name="submit" class="waves-effect waves-light btn tc-white pointer" value="Valider">
        </div>
    </form>

    <?php

    if(count($_SESSION['withdrawals'])){
        echo "<p>Dernier retrait : " . end($_SESSION['withdrawals']) . "€</p>";
        echo "<p>Montant moyen des retraits : " . round(array_sum($_SESSION['withdrawals'])/count($_SESSION['withdrawals']), 2) . "€ (" . count($_SESSION['withdrawals']) . " retraits)</p>";
    }
    
    if(count($_SESSION['deposits'])){
        echo "<p>Dernier dépôt : " . array_pop($_SESSION['deposits']) . "€</p>";
        echo "<p>Montant moyen des dépôts : " . round(array_sum($_SESSION['deposits'])/count($_SESSION['deposits']), 2) . "€ (" . count($_SESSION['deposits']) . " dépôts)</p>";
    }
    ?>
</section>