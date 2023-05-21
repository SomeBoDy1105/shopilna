<?php
// session_start();
require_once "/xampp/htdocs/shopilna/config/commandes.php";
$myCategories = afficherCategory();

    echo "<script>  alert('".$_SESSION['user']."'); </script>";
?>

<nav class="navbar navbar-light navbar-expand-md sticky-top" style="background: var(--navBC); border-bottom: 1px solid; border-width:1px;">
    <div class="container-fluid"><a class="navbar-brand" href="index.php"
            style="padding-left: 0px;margin-left: 26px;margin-right: 56px; color: var(--bg-secondary); "><strong>Shopilna</strong></a><button
            data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse flex-row justify-content-start" id="navcol-1">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#">Deals</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Coupons</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Top Sellings</a></li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
                        data-bs-toggle="dropdown" href="#" style="color:var(--bg-secondary);">Men</a>
                    <div class="dropdown-menu">
                        <?php foreach ($myCategories as $category) : ?>
                        <a class="dropdown-item" href="#"><?= $category->nom ?></a>
                        <div class="dropdown-divider"></div>
                        <?php endforeach; ?>
                    </div>
                </li>
                    </div>
            </ul><a class="btn active d-xl-flex align-content-center  justify-content-xl-center align-items-xl-center"
                role="button" href="users/Checkout.php"
                 style="background: #181720;margin-right: 4px; color:white">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16"
                    class="bi bi-cart d-xl-flex justify-content-center align-items-center align-content-center align-self-center justify-content-xl-center align-items-xl-center"
                    style="font-size: 19px;padding-right: 0px;margin-left: 3px;margin-right: 9px;">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                    </path>
                </svg><span
                    class="d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">Cart</span></a>
            <a class="btn active d-xl-flex align-content-center  justify-content-xl-center align-items-xl-center"
                role="button"
                style="margin-left: 16px;padding: 6px 8px 6px 8px;margin-right: 34px;padding-left: 12px;padding-right: 16px; background-color :#30A78B; border-color :#30A78B;"
                href="loginPage.php"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                    fill="currentColor" viewBox="0 0 16 16"
                    class="bi bi-person d-xl-flex align-items-center justify-content-xl-center align-items-xl-center"
                    style="margin-right: 8px;font-size: 22px;margin-top: 0px;">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                    </path>
                </svg><span class="d-xl-flex justify-content-xl-center align-items-xl-center"
                    style="margin-top: 0px;padding-top: 0px;"><?php 
                    if(isset($_SESSION['user'])) {
                        echo "Logout";
                    } else {
                        echo "Login";
                    } ?>
                    </span></a>
                <img src="assets/img/moon.png" id="icon">
        </div>
    </div>
</nav>