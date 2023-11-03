<section>
    <form method="post" class="row" action="">
        <div class="input-field col s12 m6">
            <input type="text" id="teacher" required name="teacher">
            <label for="teacher">Professeur : </label>
        </div>
        <div class="input-field col s12 m6">
            <input type="text" id="lesson" required name="lesson">
            <label for="lesson">Cours : </label>
        </div>
        <div class="input-field col s12">
            <input type="submit" name="submit" class="waves-effect waves-light btn tc-white pointer" value="Valider">
        </div>
    </form>

    <?php
        if($_POST['submit']){
            echo "<h1>Le cours de " . $_POST['lesson'] . " est dirigé par " . $_POST['teacher'] . "</h1>";
        }
    ?>
</section>