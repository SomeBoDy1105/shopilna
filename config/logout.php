<?php
session_start();

if (isset($_SESSION['xRttpHo0greL39'])){

    $_SESSION['xRttpHo0greL39'] = array();

    session_destroy();

    header("Location: ../loginPage.php");
} else {
    header("location:../index.php");
}


?>