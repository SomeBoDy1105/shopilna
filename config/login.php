<?php
require("commandes.php");

if(isset($_POST['login']))
{
    if(!empty($_POST['email']) AND !empty($_POST['password']))
    {
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $password = htmlspecialchars(strip_tags($_POST['password']));
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $admin = checkAdmin($email, $password);
            if($admin){
                $_SESSION['user'] = $admin;
                header('Location:admin/');
            }else{
                header('Location:index.php');
                
            }
        } else {
            header('Location:index.php');
        }   
    }else{
        header('Location:index.php');
    }

}



?>