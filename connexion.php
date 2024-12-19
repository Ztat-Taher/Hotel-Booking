<?php
$host = 'localhost';
$dbname = 'BDD_res';
$username = 'root';
$password = '';

try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //echo "Connexion reussie<br>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>