<?php
session_start();
require("../config/commandes.php");
// add product
if (isset($_POST['add'])) {
    if (!empty($_POST['category']) AND !empty($_POST['nom']) and !empty($_POST['description']) and !empty($_POST['marque']) and !empty($_POST['prix']) and !empty($_POST['photo']) and !empty($_POST['quantity'])) {
        $category_id = $_POST['category'];
        $nom = htmlspecialchars($_POST['nom']);
        $description = htmlspecialchars($_POST['description']);
        $marque = $_POST['marque'];
        $prix = htmlspecialchars($_POST['prix']);
        $photo = htmlspecialchars($_POST['photo']);
        $quantity = htmlspecialchars($_POST['quantity']);
        if (!checkProduct($nom, $marque, $prix)) {
            $newproduct = ajouterProduct($category_id, $nom, $description, $marque, $prix, $photo, $quantity);
        } else {
            echo "Product already exists";
        }
    } else {
        echo "Please fill all the fields";
    }
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
        <div class="container-fluid my-2" style="background-color: rgba(255,255,255,0.50);   ">
            <form class="text-center" method="post">
                <h1 class="text-center m-4">Add Product</h1>
                <div class="mb-3">
                    <select class="form-control" name="category" id="category">
                        <option value=" ">--Category-- </option>
                        <?php
                    $getcategory = afficherCategory();
                    foreach ($getcategory as $category) {
                    ?>
                        <option value="<?= $category->id ?>"><?= $category->nom ?> // <?= $category-> id ?> </option>
                        <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="mb-3"> <input class="form-control" type="text" name="nom" placeholder="Name" autofocus="on"
                        autocomplete="on" inputmode="text" required></div>
                <div class="mb-3"> <input class="form-control" type="text" name="marque" placeholder="marque"
                        autocomplete="on" inputmode="text" required> </div>
                <div class="mb-3"> <input class="form-control" type="text" name="description" placeholder="Description"
                        autocomplete="on" inputmode="text" required> </div>
                <div class="mb-3"> <input class="form-control" type="number" name="prix" placeholder="Price"
                        autocomplete="on" inputmode="text" required> </div>
                <div class="mb-3"><input class="form-control" type="number" name="quantity" placeholder="Quantity"
                        required> </div>
                <!-- <div class="mb-3"><input class="form-control" type="file" name="pic" > -->
                <div class="mb-3"> <input class="form-control" type="text" name="photo" placeholder="Photo Link"
                        autocomplete="on" inputmode="text" required> </div>
                <div class="mb-3" style="border-width: 0px;"><input class="btn btn-primary d-block w-100" type="submit"
                        value="Add" name="add"
                        style="background: #8aa5ad;border-radius: 8px;border-width: 0px;border-style: none;">
                </div>
            </form>
        </div>

        <div class="card ">
            <?php
        $getproduct = afficherProducts();
        foreach ($getproduct as $product) {
        ?>
            <div class="card-body">
                <h5 class="card-title"><?= $product->nom  ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $product->description ?></h6>
                <p class="card-text"><?= $product->Marque ?></p>
                <p class="card-text"><?= $product->prix ?></p>
                <p class="card-text"><?= $product->photo ?></p>
                <p class="card-text"><?= $product->quantity ?></p>
                <hr>
            </div>
            <?php
        }
        ?>

        </div>
    </body>

</html>