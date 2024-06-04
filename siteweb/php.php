<?php
$host = '127.0.0.1'; // ou votre adresse de serveur
$db   = 'hotel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";


try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collecter la valeur du champ recherche
  $mail = $_POST['email'];
  $password = $_POST['password'];

  if ($mail == $password)
   { echo "Vous avez réussi à vous connecter"; }

}
echo "test";
