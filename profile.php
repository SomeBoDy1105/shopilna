<?php
session_start();
require "config/commandes.php";

if (!isset($_SESSION['user'])) {
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Profile</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/styles.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets\css\custom.css">
        <script src='assets/bootstrap/js/bootstrap.min.js'></script>
        <script src='/assets/js/script.min.js'></script>
    </head>

    <body>
        <?php
    require "assets/php/navbar.php";
    ?>

        <section class="p-3 m-2">
            <div class="py-2 text-center" style="border-style: solid;border-color: black; border-width: 1px; border-radius: 20px;
        background-color: var(--bg-primary);color:var(--bg-secondary);">
                <div class="container">
                    <h1 class="jumbotron-heading">Welcome To Shopilna</h1>
                    <p class="lead text-muted">This is your profile page</p>
                </div>
            </div>

        </section>

        <aside>
            <div class="album py-5 ">
                <div class="container ">
                    <div class="row py-2 px-0 mytheme " style="border-style: solid;border-color: var(--bg-primary); border-width:2px ; border-radius: 20px; 
                background-color: var(--bg-primary); color:var(--bg-secondary);">
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top" src="assets/img/undraw_profile.svg" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">Your Name :
                                        <?php echo $_SESSION['user'] . ' ' . $_SESSION['prenom']; ?></p>
                                    <p class="card-text">Your Email : <?php echo $_SESSION['email']; ?></p>
                                    <p class="card-text">Your Phone : <?php echo $_SESSION['phone']; ?></p>
                                    <p class="card-text">Your Address : <?php echo $_SESSION['address']; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">Your Orders : </p>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            // <?php
                                            // $commandes = new Commandes();
                                            // $commandes->getCommandes($_SESSION['id']);
                                            // 
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </aside>
        <section class="p-3 m-2">
            <div class="py-2 text-center" style="border-style: solid;border-color: black; border-width: 1px; border-radius: 20px;
        background-color: var(--bg-primary);color:var(--bg-secondary);">
                <div class="container">
                    <h1 class="jumbotron-heading">Your Orders</h1>
                    <p class="lead text-muted">Here you can see your orders</p>
                </div>
            </div>
        </section>

        <section class="p-3 m-2">
            <div class="py-2 text-center" style="border-style: solid;border-color: black; border-width: 1px; border-radius: 20px;
        background-color: var(--bg-primary);color:var(--bg-secondary);">
                <div class="container">
                    <h1 class="jumbotron-heading">Your Profile</h1>
                    <p class="lead text-muted">Here you can see your profile</p>
                </div>
            </div>
        </section>

        <section class="p-3 m-2">
            <div class="py-2 text-center" style="border-style: solid;border-color: black; border-width: 1px; border-radius: 20px;
        background-color: var(--bg-primary);color:var(--bg-secondary);">
                <div class="container">
                    <h1 class="jumbotron-heading">Your Cart</h1>
                    <p class="lead text-muted">Here you can see your cart</p>
                </div>
            </div>
        </section>

        <section class="p-3 m-2">
            <div class="py-2 text-center"
                style="border-style: solid;border-color: black ;border-width: 1px; border-radius: 20px;">
                <div class="container">
                    <h1 class="jumbotron-heading">Your Orders</h1>
                    <p class="lead text-muted">Here you can see your orders</p>
                </div>
            </div>
        </section>




    </body>

</html>