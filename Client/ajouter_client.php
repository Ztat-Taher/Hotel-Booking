<?php
require_once ('..\connexion.php');
require_once ('classe_client.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CIN = $_POST['CIN'];
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Adresse = $_POST['Adresse'];

    $client = new Client($connexion);

    $client->addClient($CIN, $Nom, $Prenom, $Adresse);

    header("Location: afficher_client.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Client</title>

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
                            <h1>Ajouter Client</h1>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-7">
                        <div class="booking-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <span class="form-label">CIN:</span>
                                    <input class="form-control" type="text" id="CIN" name="CIN" required>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Nom:</span>
                                    <input class="form-control" type="text" id="Nom" name="Nom" required>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Prénom:</span>
                                    <input class="form-control" type="text" id="Prenom" name="Prenom" required>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Adresse:</span>
                                    <input class="form-control" type="text" id="Adresse" name="Adresse" required>
                                </div>
                                <div class="form-btn">
                                    <button class="submit-btn" type="submit">Ajouter Client</button>
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
