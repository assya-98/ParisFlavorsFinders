<?php

require_once "include/actions.php";
$restos = get_resto();
require_once("include/header.php");
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Paris Flavors Finders </title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;700&family=Shrikhand&display=swap" rel="stylesheet">
        <link  rel="stylesheet" href="./css/normalize.css">
        <link rel='stylesheet' href="./css/style.css" type='text/css'>
        <script src="https://kit.fontawesome.com/ece17b4c54.js" crossorigin="anonymous"></script>

    </head>

    <body>


<div class="localisation">
            <i class="fa-sharp fa-solid fa-location-dot"></i>
            <p><strong>Paris, 15 ème</strong></p>
        </div>


        <div class="container">

            
            <header>
                <img src="./img/logo/logo.png" alt="logo">

            </header>

            <nav>
            

               <div class="nav_container">
                    <h2>Découvrez des restaurants d'éxception, sélectionnés par nos soins.</h2>
                    <p>Notre réseau de restaurant indépendant du 15ème arrrondissement, </p>
                    <p>vous donne rendez vous en bas de chez vous</p>
                    <p>pour vous livrer des plats de haute qualité</p>

                    <div class="scroll-bottom go-to">
                        <a href="#card_container"><p class="bouton">Explorer nos restaurants</a></p>
                    </div>
               </div>

            </nav>


                <div class="fonc_container">
                    
                    <h2>Déroulement</h2>

                    <div class="fonc_menu">
                        
                        <div class="menu">
                            
                            <p class="number">1</p>
                            <i class="fa-solid fa-mobile-screen-button"></i>
                            <p class="choix">Faites votre choix parmi nos restaurants.</p>
                        
                        </div>
                    
                    
                        <div class="menu">

                            <p class="number">2</p>
                            <i class="fa-solid fa-list-ul"></i>
                            <p class="choix">Composez votre menu.</p>

                        </div>
                    
                    
                        <div class="menu">

                            <p class="number">3</p>
                            <li class="fa-solid fa-utensils"></i>
                            <p class="choix">Commandez.</p>

                        </div>   
                        
                    </div>
                        
                </div>            
            
            <article id="card_container" class="page-section">

                <div class="tit_res">
                <h2>Restaurants</h2>
                </div>
                <div class="card_container">

                   

                    <?php foreach($restos as $resto) { ?>

                    
                    <div class="card">

                        <a href="./restos.php?idresto=<?=$resto["id_resto"]?>">
                            <div class="card_body">
                                
                                <img src="./img/menus/<?= $resto["image_resto"]?>" alt="<?= $resto["nom_resto"]?>">
                            </div>

                            <div class="card_description">

                                <div class="card_place">
                                    <h3><?= $resto["nom_resto"]?></h3>
                                    <p><?= $resto["adresse_resto"]?></p>
                                </div>

                                <div class="card_like">
                                    <i class="fa-regular fa-heart"></i>
                                    <i class="fa-solid da fa-heart"></i>
                                </div>

                            </div>
                        </a>

                    </div>
                    <?php } ?>


                    

                </div>
                
                
            </article>


            <footer>
                <h1>ParisFlavorFinder</h1>
                
                <ul>
                   <!-- <li class="footli1"><i class="fa-solid fa-utensils"></i>Proposer un restaurant</li>                 
                    <li class="footli"><i class="fa-solid fa-handshake-angle"></i>Devenir partenaire</li> -->
                    <li>Mention légales</li>
                    <li><a href="mailto:#">Contact</a></li>
                </ul>
                



            </footer>

            
        </div>


    </body>




</html>

