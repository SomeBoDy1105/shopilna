<?php
include("../config/commandes.php");
if (isset($_POST['add'])) {
    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['gender']) and !empty($_POST['date']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['address']) and !empty($_POST['phone']))
        if (!checkUser($_POST['email'], $_POST['password'])) {
            $created_on = date("Y-m-d");
            $role = "u";
            $newuser = ajouterUser($_POST['nom'], $_POST['prenom'], $_POST['gender'], $_POST['date'], $_POST['email'], $_POST['password'], $role, $_POST['address'], $_POST['phone'],  $_POST['photo'],  $created_on);
            if ($newuser) {
                echo "<script>alert('YAY! You have been Registerd! Sending you now to login')</script>";
                header("refresh:0;url=../loginPage.php");
            } else {
                // echo "<script>alert('User not added successfully')</script>";
            }
        } else {
            echo "<script>alert('User already exists')</script>";
        }
    else {
        echo "Please fill all the fields";
    }
}

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Register</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='../assets/bootstrap/css/bootstrap.min.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/styles.min.css'>
        <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
        <style>
        body {

            background-image: url('../assets/img/subtle-prism-Dark.svg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        </style>

    </head>

    <body>

        <section style=" padding: 0;">
            <div class="container-fluid my-2" style="color: rgba(255,255,255,0.50); ;  ">
                <div class="row justify-content-center my-2 ">
                    <!-- column -->
                    <div class="col-md-4 my-4">
                        <!-- card -->
                        <div class="card " style="background: rgba(255,255,255,0);border-style: none;">
                            <div class="card-body d-flex flex-column align-items-center mb-0"
                                style="background: rgba(248, 247, 245, .8) ;border-radius: 28px;border-style: solid;border-color: #2e424d;margin-bottom: 82px;">
                                <div class="row text-center">

                                    <h2
                                        style="background: rgba(236, 224, 230, 1);font-family: ABeeZee, sans-serif;color: rgb(70, 61, 58);;margin-top: 24px;border-radius: 8px;">
                                        Register</h2>
                                    <p
                                        style="background: rgba(236, 224, 230, 1);font-family: ABeeZee, sans-serif;color: rgb(70, 61, 58);;border-radius: 8px;">
                                        Hello stranger !<br>Login to continue.</p>

                                </div>
                                <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"
                                    style="background: #8aa5ad ;"><svg class="bi bi-person"
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                                        </path>
                                    </svg></div>
                                <form class="text-center" method="post">
                                    <!-- <div class="column" style="border-style:solid; border-color:red;"> -->
                                    <!-- <div class="col-md-6 mb-3 " > -->
                                    <div class="mb-3"> <input class="form-control" type="text" name="nom"
                                            placeholder="Name" autofocus="on" autocomplete="on" inputmode="text"
                                            required action=' '></div>
                                    <div class="mb-3"> <input class="form-control" type="text" name="prenom"
                                            placeholder="Last name" autocomplete="on" inputmode="text" required
                                            action=' '> </div>
                                    <!-- </div> -->
                                    <!-- </div> -->
                                    <div class="mb-3">
                                        <select class="form-control" name="gender" id="gender">
                                            <option value=" ">--Gender-- </option>
                                            <option value="M">Male</option>
                                            <option value="F">Female </option>
                                        </select>
                                    </div>
                                    <div class="mb-3"><input class="form-control" type="date" name="date"
                                            placeholder="Date of birth" inputmode="date" required action=' '></div>
                                    <div class=" mb-3 "><input class="form-control" type="email" name="email"
                                            placeholder="Email" autofocus="on" autocomplete="on" inputmode="email"
                                            required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" action=' '></div>
                                    <div class="mb-3"><input class="form-control" type="password" name="password"
                                            placeholder="Password" minlength="7" required
                                            title="Password must be 7 or more characters"></div>
                                    <div class="mb-3"><input class="form-control" type="phone" name="phone"
                                            placeholder="Phone" autocomplete="on"> </div>
                                    <div class="mb-3"><input class="form-control" type="text" name="address"
                                            placeholder="Address" autocomplete="on"> </div>
                                    <div class="mb-3"><input class="form-control" type="file" name="photo"
                                            placeholder="Picture" autocomplete="on"> </div>
                                    <div class="mb-3" style="border-width: 0px;"><input
                                            class="btn btn-primary d-block w-100" value="Register" name="add"
                                            type="submit"
                                            style="background: #8aa5ad;border-radius: 8px;border-width: 0px;border-style: none;">
                                    </div>
                                    <p style="color: rgb(70, 61, 58);"> Already a member?<a
                                            style="color: #463d3a;text-decoration: underline;font-weight: bold;border: 0px none var(--bs-blue);"
                                            href="../LoginPage.php"> Login</a>&nbsp; </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- javascript -->
        <script src='../assets/bootstrap/js/bootstrap.min.js'></script>
        <script src='../assets/js/script.min.js'></script>
    </body>

</html>