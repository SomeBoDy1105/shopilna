<?php
session_start();
require("commandes.php");

if (isset($_POST['login'])) {
    if (!empty($_POST['email']) and !empty($_POST['password'])) {
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $password = htmlspecialchars(strip_tags($_POST['password']));


        $user = checkUser($email, $password);
        if ($user != false) {
            $_SESSION['id'] = $user->id;
            $_SESSION['user'] = $user->nom;
            $_SESSION['prenom'] = $user->prenom;
            $_SESSION['sexe'] = $user->sexe;
            $_SESSION['birthdate'] = $user->birthdate;
            $_SESSION['email'] = $user->email;
            $_SESSION['password'] = $user->password;
            $_SESSION['role'] = $user->role;
            $_SESSION['address'] = $user->address;
            $_SESSION['phone'] = $user->phone;
            $_SESSION['photo'] = $user->photo;
            $_SESSION['status'] = $user->status;
            echo "<script>alert('Welcome ')</script>";
            if ($user->role == 'A' or $user->role == 'a') {
                header('Location:../admin/addUser.php');
            } else if ($user->role == 'U' or $user->role == 'u') {
                header('Location:../index.php');
            }
        } else {
            echo "<script>alert('email or password incorrect')</script>";
            header('Location ../loginPage.php');
        }
    } else {
        header('Location:../index.php');
    }
} else {
    echo "Please fill all the fields";
}