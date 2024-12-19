<?php
require_once ('..\connexion.php');
require_once ('..\Chambre\classe_chambre.php');
require_once ('..\Client\classe_client.php');
require_once ('..\Reservation\classe_reservation.php');
$type = $_GET['Type'];
$dateDeb = $_GET['DateDeb'];
$dateFin = $_GET['DateFin'];

$chambre = new Chambre($connexion);
$availableRooms = $chambre->getAvailableChambresForDateRange($type, $dateDeb, $dateFin);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chambres Disponibles</title>
</head>

<body>
    <h2>Chambres Disponibles</h2>
    <?php if (!empty($availableRooms)): ?>
        <form action="..\Reservation\confirmer_reservation.php" method="post">
            <input type="hidden" name="DateDeb" value="<?php echo $dateDeb; ?>">
            <input type="hidden" name="DateFin" value="<?php echo $dateFin; ?>">
            <input type="hidden" name="Type" value="<?php echo $type; ?>">
            <label for="NumCh">Sélectionnez une chambre:</label><br>
            <select id="NumCh" name="NumCh" required>
                <?php foreach ($availableRooms as $room): ?>
                    <option value="<?php echo $room['NumCh']; ?>"><?php echo $room['NumCh']; ?> - <?php echo $room['Type']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label for="CIN">CIN du Client:</label><br>
            <input type="text" id="CIN" name="CIN" required><br>
            <input type="submit" value="Confirmer Réservation">
        </form>
    <?php else: ?>
        <p>Aucune chambre disponible pour les dates et le type de chambre sélectionnés.</p>
    <?php endif; ?>
</body>

</html>