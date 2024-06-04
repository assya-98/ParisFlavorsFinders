<?php require("include/header.php"); ?>

    <div class="container">

    <form method="post" action = "include/user.php">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" >
            
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Prenom</label>
            <input type="text" class="form-control" name="prenom">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">e-mail</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="mdp">
        </div>
        <button type="submit" name="inscription" class="btn btn-primary">Submit</button>
        </form>
    </div>
    

