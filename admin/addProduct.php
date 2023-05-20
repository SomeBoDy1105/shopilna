<?php
session_start();
require("../config/commandes.php");
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
        <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">Shopilna</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
                <div class="mb-3"><input class="form-control" type="number" name="quan" placeholder="Quantity"
                        required </div>
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
  if (isset($_POST['add'])){
    if(!empty($_POST['nom'])AND !empty($_POST['prenom'])AND !empty($_POST['date']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['role']) ){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $sexe = $_POST['sexe'];
        $date = htmlspecialchars($_POST['date']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $role = htmlspecialchars($_POST['role']);
        $phone = htmlspecialchars($_POST['phone']);
        $address = htmlspecialchars($_POST['address']);
        $photo = htmlspecialchars($_POST['photo']);
        $created_on = date("Y-m-d");
    }else{
            echo "Please fill all the fields";
        }
        
        
    $adduser= ajouterUser($nom,$prenom,$sexe,$date,$email,$password,$role,$address,$phone,$photo,$created_on);
        if($adduser){
            echo "User added successfully";
        }else{
            echo "Error";
        }

    }

?>

</html>