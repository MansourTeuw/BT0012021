<?php 

$host = 'localhost';
$username = "root";
$password = '';
$dbname = "daaraji";

$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $db = new PDO($dsn, $username, $password);

    // echo "Bienvenue! <br> ";

} catch (PDOException $e) {
    echo "Erreur, Base de Données introuvable " . $e->getMessage();

}