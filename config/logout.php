<?php
session_start();
if (isset($_SESSION['id'])){

    $_SESSION['id'] = array();

    session_destroy();
    echo "<script>alert('You have been logged out successfully')</script>";
    header("Location: ../loginPage.php");
} else {
    echo "<script>alert('Error loggin out')</script>";
    header("location:../index.php");
}


?>