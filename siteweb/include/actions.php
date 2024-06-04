<?php

require_once "connectdb.php";

function get_resto() {
    $db = connectdb();
    $request = $db -> prepare("SELECT * FROM restos");
    $request -> execute();
    $restos = $request -> fetchAll();
    return $restos;
}

function get_menus($id_resto) {
    $db = connectdb();

    $get_dessert = $db -> prepare("SELECT * FROM desserts WHERE id_resto=?");
    $get_dessert -> execute(array($id_resto));
    $desserts = $get_dessert -> fetchAll();

    $get_entree = $db -> prepare("SELECT * FROM entree WHERE id_resto=?");
    $get_entree -> execute(array($id_resto));
    $entree = $get_entree -> fetchAll();

    $get_plat = $db -> prepare("SELECT * FROM plats WHERE id_resto=?");
    $get_plat -> execute(array($id_resto));
    $plats = $get_plat -> fetchAll();

    $menus = array(
        "entree" => $entree, 
        "plat" => $plats,
        "dessert" => $desserts
    );

    return $menus;
}

function getlist_menus() {
    $db = connectdb();

    $get_dessert = $db -> prepare("SELECT nom_dessert, desserts.id_resto, restos.nom_resto FROM desserts INNER JOIN restos ON desserts.id_resto = restos.id_resto");
    $get_dessert -> execute();
    $desserts = $get_dessert -> fetchAll();

    $get_plat = $db -> prepare("SELECT nom_plat, plats.id_resto, restos.nom_resto FROM plats INNER JOIN restos ON plats.id_resto = restos.id_resto");
    $get_plat -> execute();
    $plat = $get_plat -> fetchAll();

    $get_entree = $db -> prepare("SELECT nom_entree, entree.id_resto, restos.nom_resto FROM entree INNER JOIN restos ON entree.id_resto = restos.id_resto");
    $get_entree -> execute();
    $entree = $get_entree -> fetchAll();

    $menus = array(
       "entree" => $entree, 
        "plat" => $plat,
        "dessert" => $desserts
    );

    return $menus;
}

// function delete_menu($id_resto) {
//     $db = connectdb(); // Assurez-vous d'avoir une fonction connectdb() pour établir la connexion à votre base de données.

//     // Préparez la requête de suppression

//     $request = $db->prepare("SELECT * FROM entree WHERE id_resto = ?");
//     $request->execute([$id_resto]);

//     $request = $db->prepare("SELECT * FROM plats WHERE id_resto = ?");
//     $request->execute([$id_resto]);

//     $request = $db->prepare("SELECT * FROM desserts WHERE id_resto = ?");
//     $request->execute([$id_resto]);

//     // Vérifiez si la suppression a réussi en vérifiant le nombre de lignes affectées
//     if ($request->rowCount() > 0) {
//         return true; // La suppression a réussi
//     } else {
//         return false; // La suppression a échoué
//     }
// }

function delete_menu($id_resto) {
    $db = connectdb(); // Assurez-vous d'avoir une fonction connectdb() pour établir la connexion à votre base de données.

    // Supprimez les entrées liées à ce restaurant
    $request = $db->prepare("DELETE FROM entree WHERE id_resto = ?");
    $request->execute([$id_resto]);

    // Supprimez les plats liés à ce restaurant
    $request = $db->prepare("DELETE FROM plats WHERE id_resto = ?");
    $request->execute([$id_resto]);

    // Supprimez les desserts liés à ce restaurant
    $request = $db->prepare("DELETE FROM desserts WHERE id_resto = ?");
    $request->execute([$id_resto]);

    // Vérifiez si la suppression a réussi en vérifiant le nombre de lignes affectées
    if ($request->rowCount() > 0) {
        return true; // La suppression a réussi
    } else {
        return false; // La suppression a échoué
    }
}



?>
