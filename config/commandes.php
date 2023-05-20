<?php


// Product
// ajouter // afficher // supprimer // modifier
function ajouterProduct($category_id, $nom,$description,$marque,$prix,$photo,$quantity){
    if (require("connection.php")) {
        $req = $access->prepare("INSERT INTO products(category_id,nom,description,marque,prix,photo,quantity) VALUES($category_id, $nom,$description,$marque,$prix,$photo)");
        $req->execute(array($category_id, $nom,$description,$marque,$prix,$photo,$quantity));

        $req->closeCursor();
    }

}

function afficherProducts ()
{
    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM products ORDER BY id DESC ");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

function supprimerProduct($id){
    if (require("connection.php")) {
        $req = $access->prepare("DELETE FROM products WHERE id = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }
}

function modifierProduct($id,$category_id, $nom,$description,$marque,$prix,$photo,$quantity){
    if (require("connection.php")) {
        $req = $access->prepare("UPDATE products SET nom = ?, description = ?, prix = ?,marque=?, photo = ?, quantity= ? WHERE id = ?");
        $req->execute(array($category_id, $nom,$description,$marque,$prix,$photo, $quantity,$id));
        $req->closeCursor();
    }
}

// Category


// ajouter // afficher // supprimer // modifier
function ajouterCategory($nom,$description){
    if (require("connection.php")) {
        $req = $access->prepare("INSERT INTO category(nom,description) VALUES($nom,$description)");
        $req->execute(array($nom,$description));

        $req->closeCursor();
    }

}

function afficherCategory ()
{
    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM category ORDER BY id");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}


function supprimerCategory($nom){
    if (require("connection.php")) {
        $req = $access->prepare("DELETE FROM category WHERE $nom = ?");
        $req->execute(array($nom));
        $req->closeCursor();
    }
}



// User

// ajouter // afficher // supprimer // modifier
function ajouterUser($nom,$prenom,$sexe,$birthdate,$email,$password,$role,$address,$phone,$photo,$created_on){
    if (require("connection.php")) {
        $req = $access->prepare("INSERT INTO users(nom,prenom,sexe,birthdate,email,password,role,address,phone,photo,created_on) VALUES($nom,$prenom,$sexe,$birthdate,$email,$password,$role,$address,$phone,$photo,$created_on)");
        $req->execute(array($nom,$prenom,$sexe,$birthdate,$email,$password,$role,$address,$phone,$photo,$created_on));
        $req->closeCursor();
        return $req;
    }

}
function afficherUser ()
{
    if (require("connection.php")) {
        $req = $access->prepare("SELECT * FROM users ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

function supprimerUser($id){
    if (require("connection.php")) {
        $req = $access->prepare("DELETE FROM users WHERE id = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }
}

function modifierUser($nom,$prenom,$sexe,$birthdate,$email,$password,$role,$address,$phone,$photo,$status){
    if (require("connection.php")) {
        $req = $access->prepare("UPDATE user SET nom = ?, prenom = ?, sexe = ?,birthdate=?,email = ?, password = ?, role = ?, address = ?, phone = ?, photo = ?, status= ? WHERE id = ?");
        $req->execute(array($nom,$prenom,$sexe,$birthdate,$email,$password,$role,$address,$phone,$photo,$status));
        $req->closeCursor();
    }
}

function checkAdmin($email,$password ){
    if(require("connection.php")){
        $req = $access->prepare("SELECT * FROM users WHERE email = ? AND password = ? AND role = 'A'");
        $req->execute(array($email,$password));
        if($req->rowCount() == 1){
            
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else{
            $req->closeCursor();
            return false;
        }
    }


    }



?>