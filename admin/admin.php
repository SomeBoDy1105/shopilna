<?php
session_start();
require("../config/commandes.php");

if ($_SESSION['role'] == 'U') {
    header("Location: ../index.php");
}


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
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    </head>

    <body>
        <?php
    include("../assets/php/adminnavbar.php")
    ?>
        <section>
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="card-title">Hello <?php echo $_SESSION['user'] . ' ' . $_SESSION['prenom'] ?>!</h1>

                </div>
            </div>
            <div class="container px-4 py-5" id="hanging-icons">
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                    <div class="col d-flex align-items-start">
                        <div
                            class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#toggles2" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="fs-2 text-body-emphasis">Add Product</h3>
                            <p>Here You Can Add Products!</p>
                            <a href="addProduct.php" class="btn btn-primary">
                                Add Products
                            </a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div
                            class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#cpu-fill" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="fs-2 text-body-emphasis">Add User</h3>
                            <p>Here You Can Add users admin or normal users !</p>
                            <a href="adduser.php" class="btn btn-primary">
                                Add User
                            </a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div
                            class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#tools" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="fs-2 text-body-emphasis">Add Category</h3>
                            <p>Here You can add Categories to your Products</p>
                            <a href="addcategory.php" class="btn btn-primary">
                                Add Categories
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </body>
    <script src='../assets/bootstrap/js/bootstrap.min.js'></script>
    <script src..='/assets/js/script.min.js'></script>

</html>