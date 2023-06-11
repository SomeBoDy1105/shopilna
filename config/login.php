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
            if ($user->role == 'A') {
                header('Location: ../admin/admin.php');
            } else if ($user->role == 'U') {
                header('Location: ../index.php');
            }
        } else {
            echo "<script>alert('Wrong email or password'); window.location.href = '../loginPage.php';</script>";
        }
    } else {
        echo "<script>alert('Please fill all the fields'); window.location.href = '../loginPage.php';</script>";
    }
}
