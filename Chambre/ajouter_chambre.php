<?php
require_once ('..\connexion.php');
require_once ('classe_chambre.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomNumber = $_POST['roomNumber'];
    $roomType = $_POST['roomType'];
    $price = $_POST['price'];

    $chambre = new Chambre($connexion);

    $chambre->addChambre($roomNumber, $roomType, $price);

    header("Location: afficher_chambre.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Chambre</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-push-5">
                        <div class="booking-cta">
                            <h1>Ajouter Chambre</h1>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-7">
                        <div class="booking-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <span class="form-label">Room Number:</span>
                                    <input class="form-control" type="text" id="roomNumber" name="roomNumber" required>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Room Type:</span>
                                    <input class="form-control" type="text" id="roomType" name="roomType" required>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Price:</span>
                                    <input class="form-control" type="text" id="price" name="price" required>
                                </div>
                                <div class="form-btn">
                                    <button class="submit-btn" type="submit">Ajouter Chambre</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
