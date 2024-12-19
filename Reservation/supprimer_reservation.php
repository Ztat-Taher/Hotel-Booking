<?php
require_once ('..\connexion.php');
require_once ('classe_reservation.php');

if (isset($_GET['NumRes']) && !empty($_GET['NumRes'])) {
    $reservation = new Reservation($connexion);
    $reservation->deleteReservation($_GET['NumRes']);

    header("Location: afficher_reservation.php");
    exit();
} else {
    header("Location: afficher_reservation.php");
    exit();
}
?>