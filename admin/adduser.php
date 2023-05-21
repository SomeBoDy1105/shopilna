<?php
session_start();
require("../config/commandes.php");

if (isset($_POST['add'])) {

    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['gender']) and !empty($_POST['date']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['address']) and !empty($_POST['phone']))
        if (!checkUser($_POST['email'], $_POST['password'])) {
            $created_on = date("Y-m-d");
            $newuser = ajouterUser($_POST['nom'], $_POST['prenom'], $_POST['gender'], $_POST['date'], $_POST['email'], $_POST['password'], $_POST['role'], $_POST['address'], $_POST['phone'],  $_POST['photo'],  $created_on);
            if ($newuser) {
                echo "<script>alert('User added successfully')</script>";
            } else {
                echo "<script>alert('User not added successfully')</script>";
            }
        } else {
            echo "<script>alert('User already exists')</script>";
        }
    else {
        echo "Please fill all the fields";
    }
}

if(isset($_POST['remove'])){
    $uid = $_POST['uid'];
    supprimerUser($uid);

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
                    <h2 class="text-center">Add User</h2>
                    <form class="text-center" method="post">
                        <div class="column p-3" style="border-style:solid; border-color:black;border-radius:16px;">
                            <!-- <div class="col-md-6 mb-3 " > -->
                            <div class="mb-3"> <input class="form-control" type="text" name="nom" placeholder="Name"
                                    autofocus="on" autocomplete="on" inputmode="text" required></div>
                            <div class="mb-3"> <input class="form-control" type="text" name="prenom"
                                    placeholder="Last name" autocomplete="on" inputmode="text" required> </div>
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
                                    placeholder="Date of birth" inputmode="date"></div>
                            <div class=" mb-3 "><input class="form-control" type="email" name="email"
                                    placeholder="Email" autofocus="on" autocomplete="on" inputmode="email" required
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"></div>
                            <div class="mb-3"><input class="form-control" type="password" name="password"
                                    placeholder="Password" minlength="6" required
                                    title="Password must be 7 or more characters"></div>
                            <div class="mb-3"><input class="form-control" type="phone" name="phone" placeholder="Phone"
                                    autocomplete="on"> </div>
                            <div class="mb-3"><input class="form-control" type="text" name="address"
                                    placeholder="Address" autocomplete="on"> </div>
                            <div class="mb-3">
                                <select class="form-control" name="role" id="role">
                                    <option value=" ">--Role-- </option>
                                    <option value="a">Admin</option>
                                    <option value="u">User </option>
                                </select>
                            </div>
                            <div class="mb-3"><input class="form-control" type="file" name="photo" placeholder="Picture"
                                    autocomplete="on"> </div>
                            <div class="mb-3" style="border-width: 0px;"><input class="btn btn-primary d-block w-100"
                                    type="submit" value="Add" name="add"
                                    style="background: #8aa5ad;border-radius: 8px;border-width: 0px;border-style: none;">
                            </div>
                    </form>
                </div>
            </div>

            <!-- <hr> -->

            <div class="card " style="border-style:solid; border-color:black; border-radius:16px;">
                <h1 class="text-center my-3 ">List of All Users</h1>


                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name </th>
                                <th scope="col">Gender</th>
                                <th scope="col">Date of birth</th>
                                <th scope="col">Email</th>
                                <th scope="col">phone</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Role</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Created on</th>
                            </tr>
                        </thead>
                        <?php
                    $getuser = afficherUser();
                    foreach ($getuser as $user) {
                    ?>
                        <tbody>
                            <tr class="">
                                <td scope="row">
                                    <form  method="POST">
                                        <input type="hidden" name="uid"
                                            value="<?= getUid($user->nom, $user->prenom, $user->email) ?>">
                                        <input type="submit" name="remove" value="Remove">
                                    </form>
                                </td>
                                <td scope="row"><?= $user->nom  ?></td>
                                <td><?= $user->prenom ?></td>
                                <td><?= $user->sexe  ?></td>
                                <td><?= $user->birthdate ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->phone ?></td>
                                <td><?= $user->address ?></td>
                                <td><?= $user->role ?></td>
                                <td><?= $user->photo ?></td>
                                <td><?= $user->created_on ?></td>
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