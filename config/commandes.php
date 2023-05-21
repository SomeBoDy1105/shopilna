<?php


// Product
// ajouter // afficher // supprimer // modifier
function ajouterProduct($category_id, $nom, $description, $marque, $prix, $photo, $quantity)
{
    if (require("connection.php")) {
        $req = $access->prepare("INSERT INTO products(category_id,nom,description,marque,prix,photo,quantity) VALUES(?,?,?,?,?,?,?)");
        $req->execute(array($category_id, $nom, $description, $marque, $prix, $photo, $quantity));
        $req->closeCursor();
        return $access->lastInsertId();
    }
}

function getPid($nom, $Marque, $prix)
{
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
}

function afficherProducts()
{
    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM products ORDER BY id DESC ");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

function supprimerProduct($id)
{
    if (require("connection.php")) {
        $req = $access->prepare("DELETE FROM products WHERE id = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }
}

function modifierProduct($id, $category_id, $nom, $description, $Marque, $prix, $photo, $quantity)
{
    if (require("connection.php")) {
        $req = $access->prepare("UPDATE products SET nom = ?, description = ?, prix = ?,Marque=?, photo = ?, quantity= ? WHERE id = ?");
        $req->execute(array($category_id, $nom, $description, $Marque, $prix, $photo, $quantity, $id));
        $req->closeCursor();
    }
}

function checkProduct($nom, $Marque, $prix)
{
    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM products WHERE nom = ? AND Marque = ? AND prix =?");
        $req->execute(array($nom, $Marque, $prix));
        if ($req->rowCount() == 1) {

            $data = $req->fetch(PDO::FETCH_OBJ);

            return $data;
        } else {
            $req->closeCursor();
            return false;
        }
    }
}

// Category


// ajouter // afficher // supprimer // modifier // check
function ajouterCategory($nom, $description)
{
    if (require("connection.php")) {
        $req = $access->prepare("INSERT INTO category(nom,description) VALUES(?,?)");
        $req->execute(array($nom, $description));
        $req->closeCursor();
        return $access->lastInsertId();
    }
}
function getCid($nom)
{
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
}
function afficherCategory()
{
    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM category ORDER BY id");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}


function supprimerCategory($id)
{
    if (require("connection.php")) {
        $req = $access->prepare("DELETE FROM category WHERE id = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }
}

function modifierCategory($id, $nom, $description)
{
    if (require("connection.php")) {
        $req = $access->prepare("UPDATE category SET nom = ?, description = ? WHERE id = ?");
        $req->execute(array($nom, $description, $id));
        $req->closeCursor();
    }
}

// check
function checkCategory($nom,$description)
{
    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM category WHERE nom = ? AND description=?");
        $req->execute(array($nom,$description));
        $data = $req->fetch(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}


// User

// ajouter // afficher // supprimer // modifier
function ajouterUser($nom, $prenom, $sexe, $birthdate, $email, $password, $role, $address, $phone, $photo, $created_on)
{
    if (require("connection.php")) {
        $req = $access->prepare("INSERT INTO users(nom,prenom,sexe,birthdate,email,password,role,address,phone,photo,created_on) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $req->execute(array($nom, $prenom, $sexe, $birthdate, $email, $password, $role, $address, $phone, $photo, $created_on));
        $req->closeCursor();
        return $access->lastInsertId();
    }
}

function getUid($nom, $prenom, $email)
{
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
}
function afficherUser()
{
    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM users ORDER BY id ");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

function supprimerUser($id)
{
    if (require("connection.php")) {
        $req = $access->prepare("DELETE FROM users WHERE id = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }
}

function modifierUser($nom, $prenom, $sexe, $birthdate, $email, $password, $role, $address, $phone, $photo)
{
    if (require("connection.php")) {
        $req = $access->prepare("UPDATE users SET nom = ?, prenom = ?, sexe = ?,birthdate=?,email = ?, password = ?, role = ?, address = ?, phone = ?, photo = ? WHERE id = ?");
        $req->execute(array($nom, $prenom, $sexe, $birthdate, $email, $password, $role, $address, $phone, $photo));
        $req->closeCursor();
    }
}

function checkUser($email, $password)
{
    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM users WHERE email = ? AND password = ?;");
        $req->execute(array($email, $password));
        if ($req->rowCount() == 1) {

            $data = $req->fetch(PDO::FETCH_OBJ);

            return $data;
        } else {
            $req->closeCursor();
            return false;
        }
    }
}

function checkAdmin($email, $password)
{
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
}