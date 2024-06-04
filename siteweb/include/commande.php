<?php
require_once "connectdb.php";

if(isset($_POST["commander"])) {
    $numero = $_POST["numero"];
    $adresse = $_POST["adresse"];
    $total = $_POST["total"];

    // Debug: Afficher les données reçues du formulaire
    echo "<pre>";
    var_dump($_POST["menus_commandes"]);
    echo "</pre>";

    // Récupération des détails du menu à commander
    $menus_commandes = $_POST["menus_commandes"];

    // Générer le numéro de commande
    $numero_commande = date("YmdHis");

    // Établir la connexion avec la base de données
    $bd = connectdb();

    // Insérer la commande dans la base de données
    $request = $bd->prepare("INSERT INTO `commandes`(`numero_commande`, `date_commande`, `adresse_livraison`, `statut_commande`, `total_commande`, `numéro_client`) VALUES (?,NOW(),?,?,?,?)");
    $request->execute(array($numero_commande, $adresse, "En cours", $total, $numero));

    // Insérer les détails du menu commandé dans une table séparée
    foreach ($menus_commandes as $menu) {
        $nom_menu = $menu['nom'];
        $prix_menu = $menu['prix'];
        $quantite_menu = $menu['quantite'];

        // Insérer chaque élément du menu dans la table détails_commande
        $request_menu = $bd->prepare("INSERT INTO `details_commande`(`numero_commande`, `nom_menu`, `prix_menu`, `quantite_menu`) VALUES (?, ?, ?, ?)");
        $request_menu->execute(array($numero_commande, $nom_menu, $prix_menu, $quantite_menu));
    }

    echo '<p>Votre commande a été passée avec succès! <a href="http://localhost/siteweb/index.php">Retour vers la page principale</a></p>';
}
?>


