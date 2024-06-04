<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Votre Panier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .plate_desc {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Votre Panier</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Modifier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ajouter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Supprimer</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Plat</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemple de plat -->
                <?php foreach($menus["entree"] as $key => $entree ) { ?>
                    <tr>
                        <td><?=$entree["nom_entree"] ?></td>
                        <td><?=$entree["prix"] ?>€</td>
                        <td>
                            <input type="number" value="1">
                        </td>
                        <td><?=$entree["prix"] ?>€</td>
                    </tr>
                <?php } ?>
                <!-- Exemple de plat -->
                <?php foreach($menus["plat"] as $key => $plat ) { ?>
                    <tr>
                        <td><?=$plat["nom_plat"] ?></td>
                        <td><?=$plat["prix"] ?>€</td>
                        <td>
                            <input type="number" value="1">
                        </td>
                        <td><?=$plat["prix"] ?>€</td>
                    </tr>
                <?php } ?>
                <!-- Exemple de plat -->
                <?php foreach($menus["dessert"] as $key => $dessert ) { ?>
                    <tr>
                        <td><?=$dessert["nom_dessert"] ?></td>
                        <td><?=$dessert["prix"] ?>€</td>
                        <td>
                            <input type="number" value="1">
                        </td>
                        <td><?=$dessert["prix"] ?>€</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="text-right">
            <h5>Total à payer : <!-- Calculer le total ici --></h5>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
