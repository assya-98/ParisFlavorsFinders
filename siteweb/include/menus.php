<?php
session_start();

require_once("connectdb.php");

if (isset($_POST["ajout_menus"])) {
    // Récupération des données du formulaire
    $nom_entree = $_POST["nom_entree"] ?? '';
    $commentaire_entree = $_POST["commentaire_entree"] ?? '';
    $prix_entree = isset($_POST["prix_entree"]) ? intval($_POST["prix_entree"]) : null;

    $nom_plat = $_POST["nom_plat"] ?? '';
    $commentaire_plat = $_POST["commentaire_plat"] ?? '';
    $prix_plat = isset($_POST["prix_plat"]) ? intval($_POST["prix_plat"]) : null;

    $nom_dessert = $_POST["nom_dessert"] ?? '';
    $commentaire_dessert = $_POST["commentaire_dessert"] ?? '';
    $prix_dessert = isset($_POST["prix_dessert"]) ? intval($_POST["prix_dessert"]) : null;

    $id_resto = $_POST["restos"] ?? null;

    // Debug: afficher les valeurs récupérées
    echo "<pre>";
    var_dump($nom_entree, $commentaire_entree, $prix_entree, $nom_plat, $commentaire_plat, $prix_plat, $nom_dessert, $commentaire_dessert, $prix_dessert, $id_resto);
    echo "</pre>";

    // Validation des prix
    if ($prix_entree !== null && $prix_plat !== null && $prix_dessert !== null) {
        $db = connectdb();
        
        // Insertion des entrées
        $request1 = $db->prepare("INSERT INTO entree (nom_entree, commentaire, prix, id_resto) VALUES (?, ?, ?, ?)");
        $request1->execute([$nom_entree, $commentaire_entree, $prix_entree, $id_resto]);

        // Insertion des plats
        $request2 = $db->prepare("INSERT INTO plats (nom_plat, commentaire_plat, prix, id_resto) VALUES (?, ?, ?, ?)");
        $request2->execute([$nom_plat, $commentaire_plat, $prix_plat, $id_resto]);

        // Insertion des desserts
        $request3 = $db->prepare("INSERT INTO desserts (nom_dessert, commentaire_dessert, prix, id_resto) VALUES (?, ?, ?, ?)");
        $request3->execute([$nom_dessert, $commentaire_dessert, $prix_dessert, $id_resto]);

        header("Location: http://localhost/siteweb/");
        exit();  // Ajoutez un exit pour s'assurer que le script s'arrête après la redirection
    } else {
        echo "Veuillez entrer des prix valides pour tous les champs.";
    }
}

if (isset($_GET["suprimer"])) {
    $db = connectdb();
    $request = $db->prepare("DELETE FROM menus WHERE id = ?");
    $request->execute([$_GET["suprimer"]]);
    header("Location: http://localhost/siteweb/");
    exit();  // Ajoutez un exit pour s'assurer que le script s'arrête après la redirection
}
?>
