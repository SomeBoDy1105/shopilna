<?php
session_start();
require("../config/commandes.php");
// add product
if (isset($_POST['add'])) {
    if (!empty($_POST['category']) and !empty($_POST['nom']) and !empty($_POST['description']) and !empty($_POST['marque']) and !empty($_POST['prix']) and !empty($_POST['photo']) and !empty($_POST['quantity'])) {
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

if (isset($_POST['remove'])) {
    $pid = $_POST['pid'];
    supprimerProduct($pid);
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
        <div class="container-fluid justify-content-around my-2" style="background-color: rgba(255,255,255,0.50);   ">
            <div class="row justify-content-around my-2 ">
                <!-- column -->
                <div class="col-md-4 my-4">
                    <h1 class="text-center m-4">Add Product</h1>
                    <div class="mb-3">
                        <select class="form-control" name="category" id="category">
                            <option value=" ">--Category-- </option>
                            <?php
                        $getcategory = afficherCategory();
                        foreach ($getcategory as $category) {
                        ?>
                            <option value="<?= $category->id ?>"><?= $category->nom ?> // id: <?= $category->id ?>
                            </option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>
                    <div class="mb-3"> <input class="form-control" type="text" name="nom" placeholder="Name"
                            autofocus="on" autocomplete="on" inputmode="text" required></div>
                    <div class="mb-3"> <input class="form-control" type="text" name="marque" placeholder="marque"
                            autocomplete="on" inputmode="text" required> </div>
                    <div class="mb-3"> <input class="form-control" type="text" name="description"
                            placeholder="Description" autocomplete="on" inputmode="text" required> </div>
                    <div class="mb-3"> <input class="form-control" type="number" name="prix" placeholder="Price"
                            autocomplete="on" inputmode="text" required> </div>
                    <div class="mb-3"><input class="form-control" type="number" name="quantity" placeholder="Quantity"
                            required> </div>
                    <!-- <div class="mb-3"><input class="form-control" type="file" name="pic" > -->
                    <div class="mb-3"> <input class="form-control" type="text" name="photo" placeholder="Photo Link"
                            autocomplete="on" inputmode="text" required> </div>
                    <div class="mb-3" style="border-width: 0px;"><input class="btn btn-primary d-block w-100"
                            type="submit" value="Add" name="add"
                            style="background: #8aa5ad;border-radius: 8px;border-width: 0px;border-style: none;">
                    </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Description </th>
                            <th scope="col">Marque</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Photo link</th>
                        </tr>
                    </thead>
                    <?php
                $getproduct = afficherProducts();
                foreach ($getproduct as $product) {
                ?>
                    <tbody>
                        <tr class="">
                            <td scope="row">
                                <form method="POST">
                                    <input type="hidden" name="pid"
                                        value="<?= getPid($product->nom, $product->Marque, $product->prix) ?>">
                                    <input class="btn btn-danger" type="submit" name="remove" value="Remove">
                                </form>
                            </td>
                            <td scope="row"><?= $product->nom ?></td>
                            <td><?= $product->description ?></td>
                            <td><?= $product->Marque  ?></td>
                            <td><?= $product->prix ?></td>
                            <td><?= $product->quantity ?></td>
                            <td><a href="<?= $product->photo ?>" target="_blank" >Click here!</a></td>
                        </tr>
                        <?php
                }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

</html>