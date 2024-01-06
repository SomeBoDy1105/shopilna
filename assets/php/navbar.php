<?php
// session_start();
require_once "/xampp/htdocs/shopilna/config/commandes.php";
$myCategories = afficherCategory();

?>

<style>

</style>

<nav class="navbar navbar-light navbar-expand-lg sticky-top"
     style="background: var(--navBC); border-bottom: 1px solid; border-width:1px;">
    <!-- Navbar content -->
    <!-- logo -->
    <div class="container-fluid"><a class="navbar-brand" href="index.php"
                                    style="padding-left: 0px;margin-left: 26px;margin-right: 56px; color: var(--bg-secondary); "><strong>Darna</strong></a>
        <!-- toggle button -->
<!--        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">-->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">

        <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <!-- navbar links -->
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

            </ul>

            <!-- search bar -->
            <div class="align-self-center ">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>


            <?php
            if (isset($_SESSION['user'])) {
                if ($_SESSION['role'] == 'A') {
                    echo '<a class=" m-1 btn active d-xl-flex align-content-center  justify-content-xl-center align-items-xl-center"
                    role="button"
                    style="margin-left: 16px;padding: 6px 8px 6px 8px;margin-right: 34px;padding-left: 12px;padding-right: 16px; background-color :#dc3545; border-color :white;"
                    href= "admin/admin.php" >Admin Panel </a> ';
                }
            }
            ?>


            <ul class="navbar-nav flex-row justify-content-xl-end flex-wrap  ms-md-auto" style="margin-right: 0px;">
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<!-- Add Devices-->
<li class="nav-item">
    <a class="btn active d-xl-flex align-content-center  justify-content-xl-center align-items-xl-center"
       role="button" href="users/Checkout.php"
       style="background-color: #171717;margin-right: 0.5em; color:white">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="none"
             class="bi bi-cart d-xl-flex justify-content-center align-items-center align-content-center align-self-center justify-content-xl-center align-items-xl-center"
             style="font-size: 19px;padding-right: 0px;margin-left: 3px;margin-right: 9px;">>
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M7.75 2C7.94891 2 8.13968 2.07902 8.28033 2.21967C8.42098 2.36032 8.5 2.55109 8.5 2.75V7H12.75C12.9489 7 13.1397 7.07902 13.2803 7.21967C13.421 7.36032 13.5 7.55109 13.5 7.75C13.5 7.94891 13.421 8.13968 13.2803 8.28033C13.1397 8.42098 12.9489 8.5 12.75 8.5H8.5V12.75C8.5 12.9489 8.42098 13.1397 8.28033 13.2803C8.13968 13.421 7.94891 13.5 7.75 13.5C7.55109 13.5 7.36032 13.421 7.21967 13.2803C7.07902 13.1397 7 12.9489 7 12.75V8.5H2.75C2.55109 8.5 2.36032 8.42098 2.21967 8.28033C2.07902 8.13968 2 7.94891 2 7.75C2 7.55109 2.07902 7.36032 2.21967 7.21967C2.36032 7.07902 2.55109 7 2.75 7H7V2.75C7 2.55109 7.07902 2.36032 7.21967 2.21967C7.36032 2.07902 7.55109 2 7.75 2Z"
                  fill="#fafafa"/>
        </svg>
        <span
                class="d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">Devices</span></a>
</li>
<!-- notifications -->
            
<li class="nav-item">
    <a class="btn active d-xl-flex  align-content-center justify-content-xl-center align-items-xl-center"
       role="button" href="#"
       style="background-color: #171717;margin-right: 0.5em; color:white">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 14 16" fill="none"
             class="bi bi-cart d-xl-flex justify-content-center align-items-center align-content-center align-self-center justify-content-xl-center align-items-xl-center"
             style="font-size: 24px;padding-right: 0;margin-inline: 3px">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M7 0C4.23858 0 2 2.23858 2 5V7.94722C2 7.99658 1.98539 8.04483 1.95801 8.0859L0.25488 10.6406C0.08868 10.8899 0 11.1828 0 11.4824C0 12.3206 0.67945 13 1.51759 13H12.4824C13.3206 13 14 12.3206 14 11.4824C14 11.1828 13.9113 10.8899 13.7451 10.6406L12.042 8.0859C12.0146 8.04483 12 7.99658 12 7.94722V5C12 2.23858 9.7614 0 7 0ZM3.5 5C3.5 3.067 5.067 1.5 7 1.5C8.933 1.5 10.5 3.067 10.5 5V7.94722C10.5 8.29272 10.6023 8.63048 10.7939 8.91795L12.497 11.4726C12.499 11.4755 12.5 11.4789 12.5 11.4824C12.5 11.4847 12.4995 11.4873 12.4995 11.4873L12.4989 11.489C12.4989 11.489 12.497 11.4927 12.4948 11.4948C12.4927 11.497 12.489 11.4989 12.489 11.4989C12.489 11.4989 12.4862 11.5 12.4824 11.5H1.51759C1.51378 11.5 1.51097 11.4989 1.51097 11.4989C1.51097 11.4989 1.50729 11.497 1.50515 11.4948C1.50302 11.4927 1.50107 11.489 1.50107 11.489C1.50107 11.489 1.5 11.4862 1.5 11.4824C1.5 11.4789 1.50103 11.4755 1.50295 11.4726L3.20609 8.91795C3.39773 8.63048 3.5 8.29272 3.5 7.94722V5Z"
                  fill="#FAFAFA"/>
            <path d="M8.98458 14.2495C8.86177 15.2363 8.02007 16 6.99999 16C5.97991 16 5.13821 15.2363 5.0154 14.2495C4.99835 14.1125 5.11192 14 5.24999 14H8.74999C8.88806 14 9.00159 14.1125 8.98458 14.2495Z"
                  fill="#FAFAFA"/>
        </svg>
    </a>
</li>
            ';
                }
                ?>

                <li class="nav-item">
                    <a class="btn active d-xl-flex align-content-center justify-content-xl-center align-items-xl-center"
                       role="button"
                       style="margin-right: 34px;padding: 6px 16px 6px 12px;background-color :#5fac6c; border-color :#30A78B;"
                       href="<?php
                       if (isset($_SESSION['user'])) {
                           echo "config/logout.php";
                       } else {
                           echo "LoginPage.php";
                       }
                       ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="none"
                             class="bi bi-person d-xl-flex align-items-center justify-content-xl-center align-items-xl-center"
                             style="margin-right: 0.5em;font-size: 22px;margin-top: 0px;">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M10.5 5C10.5 5.66304 10.2366 6.29892 9.76777 6.76776C9.29893 7.23661 8.66304 7.5 8 7.5C7.33696 7.5 6.70108 7.23661 6.23224 6.76776C5.76339 6.29892 5.5 5.66304 5.5 5C5.5 4.33696 5.76339 3.70107 6.23224 3.23223C6.70108 2.76339 7.33696 2.5 8 2.5C8.66304 2.5 9.29893 2.76339 9.76777 3.23223C10.2366 3.70107 10.5 4.33696 10.5 5ZM10.561 8.073C11.1923 7.54664 11.6461 6.83858 11.8608 6.04514C12.0754 5.25169 12.0403 4.4114 11.7604 3.63858C11.4805 2.86576 10.9693 2.19793 10.2964 1.72594C9.62345 1.25396 8.82145 1.00075 7.9995 1.00075C7.17755 1.00075 6.37555 1.25396 5.70262 1.72594C5.02969 2.19793 4.51849 2.86576 4.23859 3.63858C3.95868 4.4114 3.92364 5.25169 4.13825 6.04514C4.35286 6.83858 4.80669 7.54664 5.438 8.073C4.45359 8.5384 3.61427 9.26275 3.0099 10.1685C2.40553 11.0743 2.05886 12.1273 2.007 13.215C2.00218 13.411 2.07428 13.6011 2.20788 13.7445C2.34147 13.888 2.52593 13.9735 2.72177 13.9826C2.9176 13.9918 3.10923 13.9239 3.25562 13.7935C3.40201 13.6631 3.49153 13.4806 3.505 13.285C3.55952 12.1295 4.0569 11.0394 4.89391 10.241C5.73091 9.44253 6.84324 8.99707 8 8.99707C9.15676 8.99707 10.2691 9.44253 11.1061 10.241C11.9431 11.0394 12.4405 12.1295 12.495 13.285C12.4975 13.3849 12.5198 13.4832 12.5608 13.5743C12.6018 13.6654 12.6606 13.7474 12.7337 13.8154C12.8068 13.8835 12.8928 13.9363 12.9865 13.9707C13.0803 14.0051 13.18 14.0204 13.2798 14.0157C13.3796 14.0111 13.4774 13.9865 13.5676 13.9435C13.6577 13.9005 13.7384 13.84 13.8048 13.7654C13.8713 13.6908 13.9221 13.6037 13.9544 13.5092C13.9868 13.4147 13.9999 13.3146 13.993 13.215C13.941 12.1272 13.5942 11.0741 12.9897 10.1683C12.3851 9.26255 11.5456 8.53826 10.561 8.073Z"
                                  fill="#171717"/>
                        </svg>
                        <span class="d-xl-flex justify-content-xl-center align-items-xl-center"
                              style="margin-top: 0px;padding-top: 0px;"><?php
                            if (isset($_SESSION['user'])) {
                                echo 'Logout';
                            } else {
                                echo "Login";
                            } ?>
                    </span>
                    </a>
                </li>

                <li class="nav-item">
                    <img style="width: 30px;
            cursor: pointer;" class="my-1" width="40" src="assets/img/moon.png" id="icon">
                </li>
            </ul>
        </div>
    </div>
</nav>


<script>
    let icon = document.getElementById("icon");
    icon.onclick = function () {
        document.body.classList.toggle("dark-mode");
        if (document.body.classList.contains("dark-mode")) {
            icon.src = "assets/img/sun.png";
        } else {
            icon.src = "assets/img/moon.png";
        }
    }
</script>