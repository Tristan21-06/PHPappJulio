<?php
    $nbStudents = 3;
    $nbMarks = 4;

    /**
     * function sortMarks
     * sort marks tabs for each student
     * parameters : array $marks
     * return : array $marks
     */
    function sortMarks($marks) {
        for ($j = 0; $j < count($marks); $j++) {
            for ($k = 1; $k < count($marks[$j]); $k++) {
                for ($m = 0; $m < count($marks[$j]) - 1; $m++) {
                    // switch places for 2 marks in student mark array
                    if ($marks[$j][$m] > $marks[$j][$m+1]) {
                        $temp = $marks[$j][$m];
                        $marks[$j][$m] = $marks[$j][$m+1];
                        $marks[$j][$m+1] = $temp;
                    }
                }
            }
        }

        return $marks;
    }

    /**
     * function sumsMarks
     * get sums for eahc marks of every students
     * parameters : array $marks
     * return : array $sums
     */
    function sumsMarks($marks) {
        $sums = array();
        foreach ($marks as $student) {
            $sum = 0;
            foreach ($student as $mark) {
                $sum += $mark;
            }
            $sums[] = $sum;
            $sum = 0;
        }

        return $sums;
    }

    /**
     * function ranksMarks
     * get the lower and greater marks
     * parameters : array $marks
     * return : array $return
     */
    function ranksMarks($marks) {
        $lower = 100;
        $greater = 0;
        $return = array();

        foreach ($marks as $student) {
            foreach ($student as $mark) {
                $lower = $lower > $mark ? $mark : $lower;
                $greater = $greater < $mark ? $mark : $greater;
            }
        }

        $return['lower'] = array(
            "sentence" => "La note la plus petite est ",
            "mark" => $lower
        );
        $return['greater'] = array(
            "sentence" => "La note la plus grande est ",
            "mark" => $greater
        );;

        return $return;
    }

    /**
     * function writeFile
     * create and write data in a file in outputFiles folder
     * parameters : array $marks
     * return : bool $written
     */
    function writeFile($marks, $nbStudents, $nbMarks) {
        $directory = getcwd()."/outputFiles/";
        $filecount = 1;
    
        $files2 = glob( $directory ."*" );

        if( $files2 ) {
            $filecount = count($files2)+1;
        }

        $date = date("m-d-y");

        $myfile = fopen($directory . "$filecount-notes_$date.txt", "waxc") or die("Unable to open file!");
        
        $txt = " Liste des notes \n";

        foreach(sortMarks($marks) as $key => $student){
            $txt .= "Eleve " . ($key+1) . " : " . (implode(", ", $student)) . " \n";
        }

        foreach(ranksMarks($marks) as $key => $obj){
            $txt .= $obj["sentence"] . " : " . ($obj["mark"]) . " \n";
        }

        $txt .= "\n Liste des sommes des notes \n";
        
        foreach(sumsMarks($marks) as $key => $sum) {
            $txt .= "Somme des notes de l'eleve " . ($key+1) . " : $sum \n";
        }
        $txt .= "Somme totale des notes : " . (array_sum(sumsMarks($marks))) . " \n";

        $txt .= "\n Liste des moyennes des eleves \n";

        foreach(sumsMarks($marks) as $key => $sum){
            $txt .= "Moyenne de l'eleve " . ($key+1) . " : " . ($sum/$nbMarks) . " \n";
        }
        $txt .= "Moyenne totale des notes : " . (array_sum(sumsMarks($marks))/($nbMarks*$nbStudents)) . " \n";

        fwrite($myfile, $txt);
        fclose($myfile);

    }

    if ($_POST['submit']) {
        $marks = $_POST['marks'];

        try {
            writeFile($marks, $nbStudents, $nbMarks);
            echo "<script>M.toast({html: 'Données sauvegardées dans le dossier `outputFiles`!', classes: 'green'});</script>";
        } catch (Exception $e) {
            echo "<script>M.toast({html: 'Impossible de sauvegarder dans un fichier!', classes: 'red'});</script>";
        }
        
    }
?>

<section>
    <div class="form">
        <h2>Formulaire des notes</h2>
        <form method="post" class="row" action="">

            <?php for($i = 0; $i < $nbStudents; $i++){ ?>
                <div class="input-field col s12">
                    <h3>Elève <?= $i+1 ?></h3>
                </div>
                <?php for($j = 0; $j < $nbMarks; $j++){ ?>
                    <div class="input-field col s6 m3">
                        <input type="number" required name="marks[<?= $i ?>][<?= $j ?>]">
                        <label for="marks[<?= $i ?>][<?= $j ?>]">Note <?= $j+1 ?> : </label>
                    </div>
                <?php } ?>
            <?php } ?>

            <div class="input-field col s12">
                <input type="submit" name="submit" class="waves-effect waves-light btn tc-white pointer" value="Valider">
            </div>
        </form>
    </div>

    <div class="marks">
        <h2>Liste des notes</h2>

        <?php if ($_POST['submit']) { ?>
            <?php foreach(sortMarks($marks) as $key => $student){ ?>
                <p>Elève <?= $key+1 ?> : <?= implode(", ", $student) ?></p>
            <?php } ?>

            <?php foreach(ranksMarks($marks) as $obj){ ?>
                <p><?= $obj["sentence"] ?> : <?= $obj["mark"] ?></p>
            <?php } ?>
        <?php
            } else {
                echo "Aucune note à afficher";
            }
        ?>

    </div>

    <div class="sums">
        <h2>Liste des sommes des notes</h2>

        <?php if ($_POST['submit']) { ?>
            <?php foreach(sumsMarks($marks) as $key => $sum){ ?>
                <p>Somme des notes de l'élève <?= $key+1 ?> : <?= $sum ?></p>
            <?php } ?>
            <p>Somme totale des notes : <?= array_sum(sumsMarks($marks)) ?></p>
        <?php
            } else {
                echo "Aucune somme à afficher";
            }
        ?>

    </div>

    <div class="averages">
        <h2>Liste des moyennes des élèves</h2>

        <?php if ($_POST['submit']) { ?>
            <?php foreach(sumsMarks($marks) as $key => $sum){ ?>
                <p>Moyenne de l'élève <?= $key+1 ?> : <?= $sum/$nbMarks ?></p>
            <?php } ?>
            <p>Moyenne totale des notes : <?= array_sum(sumsMarks($marks))/($nbMarks*$nbStudents) ?></p>
        <?php
            } else {
                echo "Aucune somme à afficher";
            }
        ?>

    </div>

</section>