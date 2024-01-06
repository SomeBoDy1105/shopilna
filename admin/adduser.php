<?php
require("../config/commandes.php");

if (isset($_POST['add'])) {
    if ($_POST['password'] == $_POST['cpassword']) {
        if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['gender']) and !empty($_POST['date']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['address']) and !empty($_POST['phone']))
            if (!newUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['phone'])) {
                $created_on = date("Y-m-d");
                $role = strtoupper($_POST['role']);
                $gender = strtoupper($_POST['gender']);
                $newuser = ajouterUser($_POST['nom'], $_POST['prenom'], $gender, $_POST['date'], $_POST['email'], $_POST['password'] , $role, $_POST['address'], $_POST['phone'],  $_POST['photo'],  $created_on);
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
    } else {
        echo "<script>alert('Passwords do not match')</script>";
    }
}

if (isset($_POST['remove'])) {
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
                <div class="col-md-5 my-4">
                    <h2 class="text-center">Add User</h2>
                    <form method="post">
                        <div class="column p-3" style="border-style:solid; border-color:black;border-radius:16px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="my-1 mx-2" for="nom">First name</label>
                                        <input class="form-control" id='nom' type="text" name="nom"
                                            placeholder="First name" autofocus="on" autocomplete="on" inputmode="text"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="my-1 mx-2" for="prenom">Last name</label>
                                        <input class="form-control" id="prenom" type="text" name="prenom"
                                            placeholder="Family name" autocomplete="on" inputmode="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="my-1 mx-2" for="gender">Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value=" ">--Gender-- </option>
                                    <option value="M">Male</option>
                                    <option value="F">Female </option>
                                </select>
                            </div>
                            <div><label class="my-1 mx-2" for="date">Date of birth</label>
                                <div class="mb-3"><input class="form-control" id="date" type="date" name="date"
                                        placeholder="Date of birth" inputmode="date"></div>
                            </div>
                            <div>

                                <label class="my-1 mx-2" for="email">Email</label>
                                <div class="mb-3"><input class="form-control" id="email" type="email" name="email"
                                        placeholder="Email" autofocus="on" autocomplete="on" inputmode="email" required
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div>
                                            <label class="my-1 mx-2" for="pass">Password</label>
                                            <div class="mb-3"><input class="form-control" id="pass" type="password"
                                                    name="password" placeholder="Password" minlength="6" required
                                                    title="Password must be 7 or more characters"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div>
                                            <label class="my-1 mx-2" for="cpass">Confirm Password</label>
                                            <div class="mb-3"><input class="form-control" id="cpass" type="password"
                                                    name="cpassword" placeholder="Confirm Password" minlength="6"
                                                    required title="Password must be 7 or more characters"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>

                                <label class="my-1 mx-2" for="phone">Phone number</label>
                                <div class="mb-3"><input class="form-control" id="phone" type="phone" name="phone"
                                        placeholder="Phone" autocomplete="on"> </div>
                            </div>
                            <div>
                                <label class="my-1 mx-2" for="address">Address</label>
                                <div class="mb-3"><input class="form-control" id="address" type="text" name="address"
                                        placeholder="Address" autocomplete="on"> </div>
                            </div>
                            <div>

                                <label class="my-1 mx-2" for="role">Role</label>
                                <div class="mb-3">
                                    <select class="form-control" itemid="role" name="role" id="role">
                                        <option value=" ">--Role-- </option>
                                        <option value="a">Admin</option>
                                        <option value="u">User </option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="my-1 mx-2" for="pic">Profile Picture</label>
                                <div class="mb-3"><input class="form-control" id="pic" type="file" name="photo"
                                        placeholder="Picture" autocomplete="on"> </div>
                            </div>
                            <div>
                                <div class="mb-3" style="border-width: 0px;"><input
                                        class="btn btn-primary d-block w-100" type="submit" value="Add" name="add"
                                        style="background: #8aa5ad;border-radius: 8px;border-width: 0px;border-style: none;">
                                </div>
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
                                    <form method="POST">
                                        <input type="hidden" name="uid"
                                            value="<?= getUid($user->nom, $user->prenom, $user->email) ?>">
                                        <input class="btn btn-danger" type="submit" name="remove" value="Remove">
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
                                <td><a href="<?= $user->photo ?>" target="_blank">Click here!</a></td>
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