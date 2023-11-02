<?php
    $nbStudents = 3;
    $nbMarks = 4;
    if ($_POST['submit']) {
        $marks = $_POST['marks'];
    }

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
?>

<section>
    <div>
        <h2>Formulaire des notes</h2>
        <form method="post" class="row" action="">

            <?php for($i = 0; $i < $nbStudents; $i++){ ?>
                <h3>Elève <?= $i+1 ?></h3>
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

    <div class="marks">
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

    <div class="marks">
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