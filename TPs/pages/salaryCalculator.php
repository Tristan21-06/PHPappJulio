<?php
    if ($_POST['salary'] && $_POST['base_entry']) {
        if ($_POST['salary'] == "net") {
            $rate = 0.75;
            $typeConvert = "Net";
        } else {
            $rate = 1.25;
            $typeConvert = "Brut";
        }

        $output = "<h2>Salaire $typeConvert : </h2>" . $rate*$_POST['base_entry'];
    } else {
        if ($_POST['submit']) {
            $output = "Formulaire non valide, veuillez réessayer.";
        } else {
            $output = "";
        }
    }
?>

<section>
    <h1>Conversion de salaire</h1>
    <form method="post" class="row" action="">
        <div class="input-field col s12 m6">
            <select name="salary" id="salary" required>
                <option value="" selected disabled> --- </option>
                <option value="net">Brut en Net</option>
                <option value="brut">Net en Brut</option>
            </select>
            <label for="salary">Type de conversion : </label>
        </div>

        <div class="input-field col s12 m6">
            <input type="number" id="base_entry" name="base_entry">
            <label for="base_entry">Salaire à convertir : </label>
        </div>
        <div class="input-field col s12">
            <input type="submit" name="submit" class="waves-effect waves-light btn tc-white pointer" value="Valider">
        </div>
    </form>

    <div class="output">
        <?= $output ?>
    </div>
</section>