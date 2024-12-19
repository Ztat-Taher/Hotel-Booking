<?php
require_once ('..\connexion.php');
require_once ('classe_chambre.php');

if (isset($_GET['NumCh']) && !empty($_GET['NumCh'])) {
    $chambre = new Chambre($connexion);
    $chambre->deleteChambre($_GET['NumCh']);

    header("Location: afficher_chambre.php");
    exit();
} else {
    header("Location: afficher_chambre.php");
    exit();
}
?>
