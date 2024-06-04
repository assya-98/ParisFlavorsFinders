<?php
session_start();
require_once "include/actions.php";

// Vérifier si l'utilisateur est un administrateur
if ($_SESSION['user_type'] !== "admin") {
    header("Location: http://localhost/siteweb/index.php");
    exit; // Arrêter l'exécution du script après la redirection
}

// Vérifier si l'identifiant du menu à supprimer est fourni
if(isset($_GET['id'])) {
    $id_menu = $_GET['id'];
    
    // Appeler la fonction delete_menu avec l'ID du menu à supprimer
    if(delete_menu($id_menu)) {
        // Rediriger vers une page appropriée après la suppression
        header("Location: http://localhost/siteweb/listmenus.php");
        exit;
    } else {
        echo "Erreur lors de la suppression du menu.";
    }
} else {
    echo "Identifiant du menu non spécifié.";
}
?>

