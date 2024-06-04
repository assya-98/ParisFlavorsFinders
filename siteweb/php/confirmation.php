<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
        h2 {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Merci pour votre commande!</h2>
        <?php
            // Exemple de code PHP pour récupérer des données de la commande
            // et les afficher dans le message de confirmation
            if (isset($_GET['order_id'])) {
                $order_id = $_GET['order_id'];
                echo "<p>Votre commande #$order_id a bien été enregistrée.</p>";
            }
        ?>
        <p>Nous avons bien reçu votre commande. Un email de confirmation vous a été envoyé.</p>
        <p>Nous vous contacterons bientôt pour confirmer les détails de la livraison.</p>
        <p><a href="index.php">Retour à la page d'accueil</a></p>
    </div>
</body>
</html>
