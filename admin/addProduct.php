<?php
session_start();
require("../config/commandes.php");


// add product
if (isset($_POST['add'])){
    if(!empty($_POST['nom'])AND !empty($_POST['description'])AND !empty($_POST['marque']) AND !empty($_POST['prix']) AND !empty($_POST['photo']) AND !empty($_POST['quantity']) ){
        $nom = htmlspecialchars($_POST['nom']);
        $description = htmlspecialchars($_POST['description']);
        $marque = $_POST['marque'];
        $prix = htmlspecialchars($_POST['prix']);
        $photo = htmlspecialchars($_POST['photo']);
        $quantity = htmlspecialchars($_POST['quantity']);
    }else{
            echo "Please fill all the fields";
        }
        
        
    $addproduct= ajouterProduct($category_id, $nom,$description,$marque,$prix,$photo,$quantity);
        

    }

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Admin panel</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/styles.min.css">
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    </head>

    <body>
        <?php 
        require("/xampp/htdocs/shopilna/assets/php/adminnavbar.php");
        ?>
        <div class="container-fluid my-2" style="color: rgba(255,255,255,0.50);   ">
            <form class="text-center" method="post">
               
                <div class="mb-3"> <input class="form-control" type="text" name="nom" placeholder="Name" autofocus="on"
                        autocomplete="on" inputmode="text" required ></div>
                <div class="mb-3"> <input class="form-control" type="text" name="marque" placeholder="marque"
                        autocomplete="on" inputmode="text" required > </div>
                <div class="mb-3"> <input class="form-control" type="text" name="decs" placeholder="Description"
                        autocomplete="on" inputmode="text" required > </div>
                <div class="mb-3"> <input class="form-control" type="text" name="prix" placeholder="Price"
                        autocomplete="on" inputmode="text" required > </div>
                <div class="mb-3"><input class="form-control" type="number" name="quantity" placeholder="Quantity"
                        required > </div>
                <div class="mb-3" style="border-width: 0px;"><input class="btn btn-primary d-block w-100" type="submit"
                        value="Add"
                        style="background: #8aa5ad;border-radius: 8px;border-width: 0px;border-style: none;">
                </div>
            </form>
        </div>

        <div class="card ">
            <?php
    $getproduct = afficherProducts();
    foreach($getproduct as $product){
        ?>
            <div class="card-body">
                <h5 class="card-title"><?= $product-> nom  ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $product-> description ?></h6>
                <!-- <p class="card-text"><?= $product-> marque ?></p> -->
                <p class="card-text"><?= $product-> prix?></p>
                <p class="card-text"><?= $product-> photo ?></p>
                <p class="card-text"><?= $product-> quantity?></p>
                <hr>
            </div>
            <?php
    }
    ?>

        </div>
    </body>
    <?php
  
?>

</html>