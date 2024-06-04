 <?php


require_once("connectdb.php");

// function getlistmenus(){
//     $db = connectdb();
//     $request= $db->prepare("SELECT * FROM restos");
//     $request->execute();
//     $menus = $request->fetchAll(PDO::FETCH_ASSOC);
//     return $restaurant;
// } 


function getlistmenus(){
    $db = connectdb();
    $request= $db->prepare("SELECT `id_resto`, `nom_resto`, `adresse_resto`, `image_resto` FROM `restos` WHERE 1");
    $request->execute();
    $menus = $request->fetchAll(PDO::FETCH_ASSOC);
    return $menus;
}


function getmenusinfo($id){
    $db = connectdb();
    $request= $db->prepare("SELECT type, prix, nom, adresse.resto , restos.id as id_r, id_restos, menus.id as id_r, nom FROM menus, menus WHERE restos.id = id_restos AND menus.id=?");
    $request->execute(array($id));
    $menus = $request->fetch(PDO::FETCH_ASSOC);

    return $menus;
}

function getlistrestos() {
    $db = connectdb();
    $request = $db -> prepare ("SELECT * FROM restos");
    $request -> execute();
    return $request -> fetchAll();
}

function getrestoinfo($id) {
    $db = connectdb();
    $request = $db -> prepare(" SELECT * FROM restos where id_resto=?");
    $request -> execute(array($id));
    return $request -> fetch();

}

