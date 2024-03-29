<?php
session_start();
require("config/commandes.php");

$myProducts = afficherProducts();
$myCategory = afficherCategory();
$myUser = afficherUser();

function getCategoryName($categoryId)
{
    global $access;
    require("config/connection.php"); // Assuming this file establishes the PDO connection

    $query = "SELECT nom FROM category WHERE id = ?";
    $stmt = $access->prepare($query);
    $stmt->execute([$categoryId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    if ($result) {
        return $result['nom'];
    }

    return null;
}

?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Darna</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='assets/bootstrap/css/bootstrap.min.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='assets/css/styles.min.css'>
        <link rel="stylesheet" href="assets/css/custom.css">
        <!-- custom import -->

        <script src='assets/bootstrap/js/bootstrap.min.js'></script>
        <script src='/assets/js/script.min.js'></script>
        
        <style>

        </style>

    </head>

    <body id="mybody">

        <?php require("assets/php/navbar.php"); ?>

        <section class="p-3 m-2">
            <div class="py-2 text-center" style="border-style: solid;border-color: black; border-width: 1px; border-radius: 20px;
        background-color: var(--bg-primary);color:var(--bg-secondary);">
                <div class="container">
                    <h1 class="jumbotron-heading">Welcome To Darna</h1>
                    <p class="lead text-muted">This is a Platform where you can control all of your smart home devices !</p>
                    <?php
                if (!isset($_SESSION['user'])) {
                    echo '<p><a href="loginPage.php" class="btn btn-primary my-2 myButton " >Login! </a> <a href="users/register.php" class="btn btn-secondary my-2 " >Join Us</a> </p>';
                }else{
                    echo '<p> Hello '.$_SESSION['user'].' '.$_SESSION['prenom'].' !</p>';
                }
                ?>
                </div>
            </div>


            <div class="album py-5 ">
                <div class="container ">

                    <div class="row py-2 px-0 mytheme " style="border-style: solid;border-color: var(--bg-primary); border-width:2px ; border-radius: 20px; 
                background-color: var(--bg-primary); color:var(--bg-secondary);">
                        <?php foreach ($myProducts as $product) : ?>
                        <div class="col-md-4  ">
                            <div class="card mb-4  box-shadow"
                                style="background-color: var(--sl-primary1); color:var(--s1-secondary); border-color:var(--bg-secondary); box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);">
                                <i class=" text-center my-3 h3  "><?= $product->nom ?></i>
                                <img class="card-img-top mx" style="margin:auto; display: block;cursor:pointer;"
                                src="<?= $product->photo ?>" width="423" height="635" alt="">
                                <div class="card-body">
                                    <i class="mx-1"><?= getCategoryName($product->category_id) ?></i>
                                    <p class="card-text"><?= $product->description ?></p>
                                    <p class="card-text"><?= $product->prix ?>.DA</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-success">Add to
                                                cart</button>
                                        </div>
                                        <small class="text-muted">Left:<?= $product->quantity ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>


        </section>
        <?php
    include("assets/php/footer.php"); ?>

        <!-- <script>
        var icon = document.getElementById("icon");
        icon.onclick = function() {
            document.body.classList.toggle("dark-mode");
            if (document.body.classList.contains("dark-mode")) {
                icon.src = "assets/img/sun.png";
            } else {
                icon.src = "assets/img/moon.png";
            }
        }
        </script> -->

    </body>

</html>