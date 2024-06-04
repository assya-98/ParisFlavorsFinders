<?php
session_start();
require_once("connectdb.php");
//inscription
if (isset($_POST["inscription"])) {
    $nom= $_POST["nom"];
    $prenom= $_POST["prenom"];
    $email= $_POST["email"];
    $password= $_POST["mdp"];

    $cryptedPassword= password_hash($password, PASSWORD_DEFAULT);

    $db = connectdb();

    $request= $db->prepare("INSERT INTO `user`(`nom`, `prenom`, `email`, `password`) VALUES (?,?,?,?)");

    $request->execute(array($nom,$prenom,$email,$cryptedPassword));

    header("Location: http://localhost/siteweb/connexion.php");

}
//connexion
if (isset($_POST["connexion"])) {
  
    $email= $_POST["email"];
    $password= $_POST["mdp"];
    $db = connectdb();

    $request= $db->prepare("SELECT * FROM `user` WHERE email=?");

    $request->execute(array($email));

    $user= $request->fetch(PDO::FETCH_ASSOC);

    if (empty($user)) {
        echo "cette utilisateur n'existe pas";
    } 
    else {
        if (password_verify($password, $user["password"])) {
           // 
           $_SESSION['user_id'] = $user['id'];
           $_SESSION['user_name'] = $user['nom'];
           $_SESSION['user_type'] = $user['type'];

       
           header("Location: http://localhost/siteweb/");


        } 
        else { 
            echo "mot de passe incorrect";
        }
    }

}

// pour se deconnecter
if (isset($_GET["logout"])) { 
    session_destroy();
    header("Location: http://localhost/siteweb/");
}

