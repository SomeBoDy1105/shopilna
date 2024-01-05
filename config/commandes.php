<?php


// Product
// ajouter // afficher // supprimer // modifier
function ajouterProduct($category_id, $nom, $description, $marque, $prix, $photo, $quantity)
{
    global $access;
    if (require("connection.php")) {
        $req = $access->prepare("INSERT INTO products(category_id,nom,description,marque,prix,photo,quantity) VALUES(?,?,?,?,?,?,?)");
        $req->execute(array($category_id, $nom, $description, $marque, $prix, $photo, $quantity));
        $req->closeCursor();
        return $access->lastInsertId();
    }
    return false;
}

function getPid($nom, $Marque, $prix)
{
    global $access;
    if (require("connection.php")) {

        $req = $access->prepare("SELECT * FROM products WHERE nom =? AND Marque =? AND prix=? ");
        $req->execute(array($nom, $Marque, $prix));
        if ($req->rowCount() == 1) {

            $data = $req->fetch(PDO::FETCH_OBJ);

            return $data->id;
        } else {
            $req->closeCursor();
            return false;
        }
    }
    return false;
}

function afficherProducts()
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM products ORDER BY id DESC ");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
    return false;
}

function supprimerProduct($id)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("DELETE FROM products WHERE id = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }
}

function modifierProduct($id, $category_id, $nom, $description, $Marque, $prix, $photo, $quantity)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("UPDATE products SET nom = ?, description = ?, prix = ?,Marque=?, photo = ?, quantity= ? WHERE id = ?");
        $req->execute(array($category_id, $nom, $description, $Marque, $prix, $photo, $quantity, $id));
        $req->closeCursor();
    }
}

function checkProduct($nom, $Marque, $prix)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM products WHERE nom = ? AND Marque = ? AND prix =?");
        $req->execute(array($nom, $Marque, $prix));
        if ($req->rowCount() == 1) {

            return $req->fetch(PDO::FETCH_OBJ);
        } else {
            $req->closeCursor();
            return false;
        }
    }
    return false;
}

// Category


// ajouter // afficher // supprimer // modifier // check
function ajouterCategory($nom, $description)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("INSERT INTO category(nom,description) VALUES(?,?)");
        $req->execute(array($nom, $description));
        $req->closeCursor();
        return $access->lastInsertId();
    }
    return false;
}

function getCid($nom)
{
    global $access;

    if (require("connection.php")) {

        $req = $access->prepare("SELECT * FROM category WHERE nom =?");
        $req->execute(array($nom));
        if ($req->rowCount() == 1) {

            $data = $req->fetch(PDO::FETCH_OBJ);

            return $data->id;
        } else {
            $req->closeCursor();
            return false;
        }
    }
    return false;
}

function afficherCategory()
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM category ORDER BY id");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
    return false;
}


function supprimerCategory($id)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("DELETE FROM category WHERE id = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }
}

function modifierCategory($id, $nom, $description)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("UPDATE category SET nom = ?, description = ? WHERE id = ?");
        $req->execute(array($nom, $description, $id));
        $req->closeCursor();
    }
}

// check
function checkCategory($nom, $description)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM category WHERE nom = ? AND description=?");
        $req->execute(array($nom, $description));
        $data = $req->fetch(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
    return false;
}


// User

// ajouter // afficher // supprimer // modifier
function ajouterUser($nom, $prenom, $sexe, $birthdate, $email, $password, $role, $address, $phone, $photo, $created_on)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("INSERT INTO users(nom,prenom,sexe,birthdate,email,password,role,address,phone,photo,created_on) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $req->execute(array($nom, $prenom, $sexe, $birthdate, $email, $password, $role, $address, $phone, $photo, $created_on));
        $req->closeCursor();
        return $access->lastInsertId();
    }
    return null;
}

function getUid($nom, $prenom, $email)
{
    global $access;

    if (require("connection.php")) {

        $req = $access->prepare("SELECT * FROM users WHERE nom =? AND prenom=? AND email =?");
        $req->execute(array($nom, $prenom, $email));
        if ($req->rowCount() == 1) {

            $data = $req->fetch(PDO::FETCH_OBJ);

            return ($data->id);
        } else {
            $req->closeCursor();
            return false;
        }
    }
    return false;
}

function afficherUser()
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM users ORDER BY id ");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
    return false;
}

function supprimerUser($id)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("DELETE FROM users WHERE id = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }
}

function modifierUser($nom, $prenom, $sexe, $birthdate, $email, $password, $role, $address, $phone, $photo)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("UPDATE users SET nom = ?, prenom = ?, sexe = ?,birthdate=?,email = ?, password = ?, role = ?, address = ?, phone = ?, photo = ? WHERE id = ?");
        $req->execute(array($nom, $prenom, $sexe, $birthdate, $email, $password, $role, $address, $phone, $photo));
        $req->closeCursor();
    }
}

function newUser($nom, $prenom, $email, $phone)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM users WHERE nom = ? AND prenom = ? AND email = ? AND phone = ?");
        $req->execute(array($nom, $prenom, $email, $phone));
        if ($req->rowCount() >= 1) {
            $req->closeCursor();
            return true;
        } else {
            $req->closeCursor();
            return false;
        }
    }
    return null;
}


function checkUser($email, $password)
{
    global $access;
    var_dump($email, $password);


    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
        $req->execute();
        $data = $req->fetch(PDO::FETCH_OBJ);
        var_dump($req);
        var_dump($data);
    var_dump($email, $password);
        if ($req->rowCount() == 1) {

            return $data;
        } else {
            $req->closeCursor();
            error_log("No user found with the provided email and password");
            return null;
        }
    } else {
        error_log("error in connection");
        return null;
    }
}

//function checkUser($email, $password)
//{
//    var_dump($_POST);
//    global $access;
//
//    if (!isset($access) || !($access instanceof PDO)) {
//        error_log("Invalid PDO instance");
//        return null;
//    }
//
//    if (!file_exists("connection.php")) {
//        error_log("connection.php file not found");
//        return null;
//    }
//
//    if (!require("connection.php")) {
//        error_log("Error in connection.php");
//        return null;
//    }
//
//    $req = $access->prepare("SELECT * FROM users WHERE email = :email;");
//    $req->execute(array('email' => $email));
//
//    if ($req->rowCount() == 1) {
//        echo "<script> alert('user found'); </script>";
//        $user = $req->fetch(PDO::FETCH_OBJ);
//        if (password_verify($password, $user->password)) {
//            return $user;
//        }
//    }
//
//    error_log("No user found with the provided email and password");
////    return null;
//}


function checkAdmin($email, $password)
{
    global $access;

    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM users WHERE email = ? AND password = ? AND role= 'A';");
        $req->execute(array($email, $password));
        $data = $req->fetch(PDO::FETCH_OBJ);
        if ($req->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}
