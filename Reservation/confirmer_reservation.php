<?php
require_once ('..\connexion.php');
require_once ('classe_reservation.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numCh = $_POST['NumCh'];
    $cin = $_POST['CIN'];
    $dateDeb = $_POST['DateDeb'];
    $dateFin = $_POST['DateFin'];

    $reservation = new Reservation($connexion);
    $reservation->addReservation($cin, $numCh, $dateDeb, $dateFin);

    header("Location: afficher_reservation.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmer Réservation</title>
</head>
<body>
    <h2>Confirmer Réservation</h2>
    <p>Votre réservation a été confirmée.</p>
    <a href="afficher_reservation.php">Voir toutes les réservations</a>
</body>
</html>
