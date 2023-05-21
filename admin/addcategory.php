<?php

require("../config/commandes.php");

if (isset($_POST['add'])) {

    if (!empty($_POST['nom']) and !empty($_POST['description']))
        if (!checkCategory($_POST['nom'], $_POST['description'])) {
            $newCategory = ajouterCategory($_POST['nom'], $_POST['description']);
            if ($newCategory) {
                echo "<script>alert('category added successfully')</script>";
            } else {
                echo "<script>alert('category not added successfully')</script>";
            }
        } else {
            echo "<script>alert('category already exists')</script>";
        }
    else {
        echo "Please fill all the fields";
    }
}

if(isset($_POST['remove'])){
    $cid = $_POST['cid'];
    supprimerCategory($cid);

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
                    <h2 class="text-center">Add category</h2>
                    <form class="text-center" method="post">
                        <div class="column p-3" style="border-style:solid; border-color:black;border-radius:16px;">
                            <!-- <div class="col-md-6 mb-3 " > -->
                            <div class="mb-3"> <input class="form-control" type="text" name="nom" placeholder="Name"
                                    autofocus="on" autocomplete="on" inputmode="text" required></div>
                            <div class="mb-3"> <input class="form-control" type="text" name="description"
                                    placeholder="Desctiption" autocomplete="on" inputmode="text" required> </div>
                            <div class="mb-3" style="border-width: 0px;"><input class="btn btn-primary d-block w-100"
                                    type="submit" value="Add" name="add"
                                    style="background: #8aa5ad;border-radius: 8px;border-width: 0px;border-style: none;">
                            </div>
                    </form>
                </div>
            </div>

            <!-- <hr> -->

            <div class="card " style="border-style:solid; border-color:black; border-radius:16px;">
                <h1 class="text-center my-3 ">List of All categories</h1>


                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">id</th>
                                <th scope="col">Name </th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <?php
                    $getcategory = afficherCategory();
                    foreach ($getcategory as $category) {
                    ?>
                        <tbody>
                            <tr class="">
                                <td scope="row">
                                    <form method="POST">
                                        <input type="hidden" name="cid"
                                            value="<?= getCid($category->nom) ?>">
                                        <input class="btn btn-danger" type="submit" name="remove" value="Remove">
                                    </form>
                                </td>
                                <td scope="row"><?= getCid($category->nom) ?></td>
                                <td><?= $category->nom ?></td>
                                <td><?= $category->description  ?></td>
                            </tr>
                            <?php
                    }
                        ?>
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </body>


</html>