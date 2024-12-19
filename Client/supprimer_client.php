<?php
require_once ('..\connexion.php');
require_once ('classe_client.php');

if (isset($_GET['CIN']) && !empty($_GET['CIN'])) {
    $client = new Client($connexion);
    $client->deleteClient($_GET['CIN']);

    header("Location: afficher_client.php");
    exit();
} else {
    header("Location: afficher_client.php");
    exit();
}
?>