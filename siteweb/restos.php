<?php

require_once "include/actions.php";
require_once "include/fonctions.php";
$resto = getrestoinfo($_GET["idresto"]);
$menus = get_menus($_GET["idresto"]);

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>La table enchantée</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500;700&family=Shrikhand&display=swap" rel="stylesheet">
        <link  rel="stylesheet" href="./css/normalize.css">
        <link rel='stylesheet' href="./css/style.css">
        <script src="https://kit.fontawesome.com/ece17b4c54.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    </head>


    <body> 


        <div class="container2">
            <header>
                <div class="header_return">
                    <a href="./index.php"><i class="fa-solid fa-arrow-left"></i></a>
                    <img src="./img/logo/logo.png" alt="logo">
                </div>                                
                   
            </header>

            <form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            
            <main>


            <div>
            <img src="./img/menus/<?= $resto["image_resto"]?>" alt="<?= $resto["nom_resto"]?>"/>
            </div>


                <div class="title">
                    <h1>La Carte</h1>
                    <i class="fa-regular fa-heart"></i>
                    <i class="fa-solid da fa-heart"></i>
                </div>
            
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="plate_container">
            <article class="entrees">
                <h2>ENTRÉES</h2> 


                <?php foreach($menus["entree"] as $key => $entree ) { 
                    ?>
                
                

                <div class="plate">
                    <div class="plate_desc">
                        <div class="plate_info">
                        <h3><?=$entree["nom_entree"] ?> </h3>
                        <p><?=$entree["commentaire"] ?></p> 
                        </div>
                        <p class="price"><?=$entree["prix"] ?>€</p>
                    </div>
                    <div class="check">
                        <input type="checkbox" id="entree<?= $key ?>" name="entree[]" value="<?=$entree["prix"] ?>">
                    </div>
                </div>

                <?php } ?>
           
                

</article>


 <article class="plats">
                <h2>PLATS</h2>
                
                <?php foreach($menus["plat"] as $key => $plat ) { 
                    ?>


                <div class="plate">
                    <div class="plate_desc">
                        <div class="plate_info">
                        <h3><?=$plat["nom_plat"] ?> </h3>
                        <p><?=$plat["commentaire_plat"] ?></p>
                        </div>
                        <p class="price"><?=$plat["prix"] ?>€</p>
                    </div>
                    <div class="check">
                    <input type="checkbox" id="plat<?= $key ?>" name="plat[]" value="<?=$plat["prix"] ?>">
                    </div>
                </div>

                <?php } ?>


</article>


<article class="desserts">
                <h2>DESSERTS</h2> 

                <?php foreach($menus["dessert"] as $key => $dessert ) { 
                    ?>


                <div class="plate">
                    <div class="plate_desc">
                        <div class="plate_info">
                        <h3><?=$dessert["nom_dessert"] ?> </h3>
                        <p><?=$dessert["commentaire_dessert"] ?></p>
                        </div>
                        <p class="price"><?=$dessert["prix"] ?>€</p>
                    </div>
                    <div class="check">
                    <input type="checkbox" id="dessert<?= $key ?>" name="dessert[]" value="<?=$dessert["prix"] ?>">
                    </div>
                </div>

                <?php } ?>
                   
                <!-- Ajoutez les autres entrées ici -->
            </article>
        </div>
        <!-- <input class="bouton" type="submit" value="Commander"> -->
    </form>

                </div>

                   
                <button id="cmd" class="bouton" data-bs-toggle="modal" data-bs-target="#exampleModal">Commander</button>
                    

            </main>


            <footer>
                <h1>ParisFlavorsFinder</h1>
                
                <ul>
                    <li class="footli1"><i class="fa-solid fa-utensils"></i>Proposer un restaurant</li>                
                    <li class="footli"><i class="fa-solid fa-handshake-angle"></i>Devenir partenaire</li>
                    <li>Mention légales</li>
                    <li><a href="mailto:#">Contact</a></li>
                </ul>


            </footer>
            
            </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Votre commande</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="include/commande.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Votre numéro de téléphone : </label>
            <input type="text" name="numero" required="required" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Votre adresse : </label>
            <input type="text" name="adresse" required="required" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Total Commande : </label>
            <input type="text" name="total" class="form-control" id="total" hidden>
            <input type="text" class="form-control" id="total_2" disabled readonly>
        </div>
        <div class="modal-footer">
    <button type="submit" name="commander" class="btn btn-primary">Submit</button>
    </div>
        </form>
    </div>
   
    </div>
</div>
</div>


</body>



<script>
document.getElementById("cmd").addEventListener('click', () => {
    prixEntree1 = 0;
    prixEntree2 = 0;
    prixEntree3 = 0;
    // prixEntree4 = 0;
    // prixEntree5 = 0;
    // prixEntree6 = 0;
    
    if(document.getElementById('entree0').checked == true){
        prixEntree1 = document.getElementById('entree0').value;
    }
    if(document.getElementById('entree1').checked == true){
        prixEntree2 = document.getElementById('entree1').value;
    }
    if(document.getElementById('entree2').checked == true){
        prixEntree3 = document.getElementById('entree2').value;
    }
    // if(document.getElementById('entree3').checked == true){
    //     prixEntree1 = document.getElementById('entree3').value;
    // }
    // if(document.getElementById('entree4').checked == true){
    //     prixEntree2 = document.getElementById('entree4').value;
    // }
    // if(document.getElementById('entree5').checked == true){
    //     prixEntree3 = document.getElementById('entree5').value;
    // }
    
    prixTotalEntree = Number(prixEntree1) + Number(prixEntree2) + Number(prixEntree3);
    // + Number(prixEntree4) + Number(prixEntree5) + Number(prixEntree6)


    prixPlat1 = 0;
    prixPlat2 = 0;
    prixPlat3 = 0;
    // prixPlat4 = 0;
    // prixPlat5 = 0;
    // prixPlat6 = 0;
    if(document.getElementById('plat0').checked == true){
        prixplat1 = document.getElementById('plat0').value;
    }
    if(document.getElementById('plat1').checked == true){
        prixPlat2 = document.getElementById('plat1').value;
    }
    if(document.getElementById('plat2').checked == true){
        prixPlat3 = document.getElementById('plat2').value;
    }
    // if(document.getElementById('plat3').checked == true){
    //     prixplat1 = document.getElementById('plat3').value;
    // }
    // if(document.getElementById('plat4').checked == true){
    //     prixPlat2 = document.getElementById('plat4').value;
    // }
    // if(document.getElementById('plat5').checked == true){
    //     prixPlat3 = document.getElementById('plat5').value;
    // }

    prixTotalplat = Number(prixPlat1) + Number(prixPlat2) + Number(prixPlat3);
    // +  Number(prixPlat4) + Number(prixPlat5) + Number(prixPlat6)


    prixdessert1 = 0;
    prixdessert2 = 0;
    prixdessert3 = 0;
    // prixdessert4 = 0;
    // prixdessert5 = 0;
    // prixdessert6 = 0;
    if(document.getElementById('dessert0').checked == true){
        prixdessert1 = document.getElementById('dessert0').value;
    }
    if(document.getElementById('dessert1').checked == true){
        prixdessert2 = document.getElementById('dessert1').value;
    }
    if(document.getElementById('dessert2').checked == true){
        prixdessert3 = document.getElementById('dessert2').value;
    }
    // if(document.getElementById('dessert3').checked == true){
    //     prixdessert1 = document.getElementById('dessert3').value;
    // }
    // if(document.getElementById('dessert4').checked == true){
    //     prixdessert2 = document.getElementById('dessert4').value;
    // }
    // if(document.getElementById('dessert5').checked == true){
    //     prixdessert3 = document.getElementById('dessert5').value;
    // }

    prixTotaldessert = Number(prixdessert1) + Number(prixdessert2) + Number(prixdessert3);
    //  + Number(prixdessert4) + Number(prixdessert5) + Number(prixdessert6) 

    prixTotal = prixTotaldessert + prixTotalplat + prixTotalEntree;

    document.getElementById("total").value = prixTotal;
    document.getElementById("total_2").value = "Total Commande : "+ prixTotal;

})

</script>


</html>

