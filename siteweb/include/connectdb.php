<?php

function connectdb() {
    $user = "root";
    $pass = "";
    $host = "localhost"; // 176.137.53.81 localhost
    $database = "db_resto";
    $dsn = "mysql:host=$host;dbname=$database";

    try { // Vérifie la request
        $dbh = new PDO($dsn, $user, $pass);
    } catch (PDOException $e) { // Vérifie la request
        echo "Il y a un problème à la connexion SQL.";
    }
        return $dbh;
}