<?php
    if ($_POST['currency'] && $_POST['base_entry']) {
        if ($_POST['currency'] == "usd") {
            $rate = 1.06;
            $typeConvert = "USD";
        } else {
            $rate = 0.94;
            $typeConvert = "€";
        }

        $output = "<h2>Devises converties en $typeConvert : </h2>" . $rate*$_POST['base_entry'];
    } else {
        if ($_POST['submit']) {
            $output = "Formulaire non valide, veuillez réessayer.";
        } else {
            $output = "";
        }
    }
?>

<section>
    <h1>Conversion de devises</h1>
    <form method="post" class="row" action="">
        <div class="input-field col s12 m6">
            <select name="currency" id="currency" required>
                <option value="" selected disabled> --- </option>
                <option value="euro">USD en €</option>
                <option value="usd">€ en USD</option>
            </select>
            <label for="currency">Type de conversion : </label>
        </div>

        <div class="input-field col s12 m6">
            <input type="number" id="base_entry" name="base_entry">
            <label for="base_entry">Devises à convertir : </label>
        </div>
        <div class="input-field col s12">
            <input type="submit" name="submit" class="waves-effect waves-light btn tc-white pointer" value="Valider">
        </div>
    </form>

    <div class="output">
        <?= $output ?>
    </div>
</section>