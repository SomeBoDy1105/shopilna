<?php
require("config/commandes.php");

$myProducts = afficherProducts();
$myCategory = afficherCategory();
$myUser = afficherUser();

function getCategoryName($categoryId)
{
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
    <title>Shopilna</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/styles.min.css'>
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
    <script src='assets/bootstrap/js/bootstrap.min.js'></script>
    <script src='/assets/js/script.min.js'></script>

    <style>
        :root {
            --bg-primary: #fff;
            --bg-secondary: #181720;

            /* custom */
            --sl-primary1: #3A76CD;
            --sl-primary: #8aa5ad;
            --sl-info: #181720;
            --sl-success: #5fac6c;
            --sl-warning: #dc9c34;
            --sl-danger: #f44336;
        }
        .dark-mode {
            --bg-primary: #181720;
            --bg-secondary: #8aa5ad;
        }
        #icon{
            width: 30px;
         cursor: pointer;
        }

        .nav-link {
            color: var(--bg-secondary) !important;
        }

        body {

            background-image: url("assets/img/bg.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .mytheme {
            background-color: var(--bg-primary) !important;
            color: white !important;
        }
    </style>

</head>

<body>

    <?php include("assets/php/navbar.php"); ?>

    <section class="p-3 m-2">
        <div class="py-2 text-center" style="border-style: solid;border-color: red; border-radius: 20px;
        background-color: var(--bg-primary);color:var(--bg-secondary);">
            <div class="container">
                <h1 class="jumbotron-heading">Welcome To Shopilna</h1>
                <p class="lead text-muted">This is a online shop for the algerian people !</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Login!</a>
                    <a href="#" class="btn btn-secondary my-2">Join Us</a>
                </p>
            </div>
        </div>

        <div class="album py-5 ">
            <div class="container " style="border-style: solid;border-color: blue;">

                <div class="row py-2 mytheme " style="border-style: solid;border-color: green; border-radius: 20px; 
                background-color: var(--bg-primary); color:var(--bg-secondary);">
                    <?php foreach ($myProducts as $product) : ?>
                        <div class="col-md-4 ">
                            <div class="card mb-4 box-shadow" style="background-color: var(--bg-primary); color:var(--bg-secondary); border-color:var(--bg-secondary) ">
                                <i class=" text-center my-3  "><?= $product->nom ?></i>
                                <i class="fa-h1"><?= getCategoryName($product->category_id) ?></i>
                                <img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="<?= $product->photo ?>">
                                <div class="card-body">
                                    <p class="card-text"><?= $product->description ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
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

    <script>
        var icon = document.getElementById("icon");
        icon.onclick = function() {
            document.body.classList.toggle("dark-mode");
            if(document.body.classList.contains("dark-mode")){
                icon.src = "assets/img/sun.png";
            }else{
                icon.src = "assets/img/moon.png";
            }
        }   

    </script>

</body>

</html>