<?php
session_start();
require("../config/commandes.php");


?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Admin Panel</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='../assets/bootstrap/css/bootstrap.min.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/styles.min.css'>
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css" </head>

    <body>
        <?php
    include("../assets/php/adminnavbar.php")
    ?>
        <section>
            <div class="card text-center">
                <div class="card-body">
                    <h4 class="card-title">Hello Admin</h4>
                    <p class="card-text">Body</p>
                </div>
            </div>


        </section>

    </body>
    <script src='../assets/bootstrap/js/bootstrap.min.js'></script>
    <script src..='/assets/js/script.min.js'></script>

</html>