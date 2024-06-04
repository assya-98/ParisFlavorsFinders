<?php 
require_once("include/fonctions.php");
require_once("include/header.php");

if ($_SESSION['user_type'] !== "admin") {
    header("Location: http://localhost/siteweb/index.php");
    exit();  // Ajoutez un exit pour s'assurer que le script s'arrête après la redirection
}

$restos = getlistrestos();
?>

<div class="container">
    <form action="include/menus.php" method="post">
        <select class="form-select" name="restos">
            <option> sélectionner le type </option>
            <?php foreach($restos as $resto): ?>
                <option value="<?= $resto["id_resto"] ?>"> <?= $resto["nom_resto"] ?> </option>
            <?php endforeach; ?>
        </select>

        <fieldset>
            <label for="">Nom Entrée</label><br>
            <input name="nom_entree" type="text"><br>
            <label for="">Commentaire Entrée</label><br>
            <input name="commentaire_entree" type="text"><br>
            <label for="">Prix Entrée</label><br>
            <input name="prix_entree" type="number" step="1"><br>
        </fieldset>

        <fieldset>
            <label for="">Nom Plat</label><br>
            <input name="nom_plat" type="text"><br>
            <label for="">Commentaire Plat</label><br>
            <input name="commentaire_plat" type="text"><br>
            <label for="">Prix Plat</label><br>
            <input name="prix_plat" type="number" step="1"><br>
        </fieldset>

        <fieldset>
            <label for="">Nom Dessert</label><br>
            <input name="nom_dessert" type="text"><br>
            <label for="">Commentaire Dessert</label><br>
            <input name="commentaire_dessert" type="text"><br>
            <label for="">Prix Dessert</label><br>
            <input name="prix_dessert" type="number" step="1"><br>
        </fieldset>

        <button type="submit" name="ajout_menus" class="btn btn-primary">Ajouter menus</button>
    </form>
</div>
