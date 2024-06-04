<?php
session_start();

require_once "include/actions.php";

// Vérifier si l'utilisateur est un administrateur
if ($_SESSION['user_type'] !== "admin") {
    header("Location: http://localhost/siteweb/index.php");
    exit; // Arrêter l'exécution du script après la redirection
}

// Récupérer la liste des menus
$listmenus = getlist_menus();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Menus</title>
</head>
<body>
    
<table>
    <thead>
        <tr>
            <th>Nom Dessert</th>
            <th>Nom de l'entrée</th>
            <th>Nom du Plat</th>
            <th>Nom du resto</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listmenus["plat"] as $key => $plat):?>
            <?php if (isset($listmenus["dessert"][$key], $listmenus["entree"][$key])): ?>
                <tr>
                    <td><?= $plat["nom_resto"] ?></td> <br>
                    <td><?= $listmenus["entree"][$key]["nom_entree"] ?></td> 
                    <td><?= $plat["nom_plat"] ?></td> 
                    <td><?= $listmenus["dessert"][$key]["nom_dessert"] ?></td>
                    <td><a href="supmenus.php?id=<?= $plat["id_resto"] ?>">Supprimer</a></td>
                </tr>
            <?php endif; ?>
        <?php endforeach;?>
    </tbody>
</table>

</body>
</html>
