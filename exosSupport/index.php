<?php
    $page = $_GET['page'];
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <?php
            if(file_exists('includes/metas/'. ($page ? $page : 'helloWorld') .'_metas.php')){
                include_once('includes/metas/'. ($page ? $page : 'helloWorld') .'_metas.php');
            }
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

        <link href="assets/css/style.min.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav>
                <div class="nav-wrapper">
                    <a href="/" class="brand-logo center"><img src="/assets/img/logo_2x_feoygs.webp" alt="Logo ITAkademy"></a>
                    <ul id="nav-mobile">
                        <!-- <li>
                            <a href="/?page=marksManagement">
                                Notes
                            </a>
                        </li>
                        <li>
                            <a href="/?page=converter">
                                Devise
                            </a>
                        </li>
                        <li>
                            <a href="/?page=salaryCalculator">
                                Salaire
                            </a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <?php
                include_once('pages/'. ($page ? $page : 'helloWorld') .'.php');
            ?>
        </main>

        <footer class="tc-white">
            <section class="semi-pad">
                <p>© IT Akademy</p>
            </section>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript" src="assets/js/base.min.js"></script>
        
        <?php
            if(file_exists('assets/js/'. ($page ? $page : 'helloWorld') .'.min.js')){
                echo '<script type="text/javascript" src="assets/js/'. ($page ? $page : 'helloWorld') .'.min.js"></script>';
            }
        ?>
    </body>
</html>