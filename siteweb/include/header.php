<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> </title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;700&family=Shrikhand&display=swap" rel="stylesheet">
        <link  rel="stylesheet" href="./css/normalize.css">
        <link rel='stylesheet' href="./css/style.css" type='text/css'>
        <script src="https://kit.fontawesome.com/ece17b4c54.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

        
    </head>

    <body>


<header>
<header>

<nav class="d-flex justify-content-between w-100">
    <div>
        <a href="index.php">Accueil</a>
      
    </div>

    <div class="d-flex justify-content-end">
        <?php if(isset($_SESSION["user_id"])) { 
            if( $_SESSION ["user_type"]  == "admin"){ ?>
              <a class = "m-2" href="ajoutmenus.php">AJOUT </a>
              <a class = "m-2" href="listmenus.php">LISTE </a> 
              <!-- Sur cette page liste, nous voyons la liste des plats dans les restos : nom du resto / entree / plats / dessert / prix et mettre un bouton pour modifier / mettre à jour -->
                
        <?php }?>
        
            <a class = "m-2" href="#"><?= $_SESSION["user_name"]?></a> 
            <a class = "m-2" href="include/user.php?logout=logout"><i class="fa-solid fa-power-off"></i> <br></a> 
       <?php } else{ ?>

        <a class = "m-2" href="inscription.php">inscription</a>
        <a class = "m-2" href="connexion.php">Connexion</a>

        <?php } ?>

    </div>

</nav>
</header>


<?php

// if(isset($_SESSION["user_id"])){
//     echo '<a href="#">'. $_SESSION["user_name"]. '</a> ';
// }else{
//     echo '<a href="inscription.php">inscription</a>
//     <a href="connexion.php">Connexion</a>';
// }

?> 