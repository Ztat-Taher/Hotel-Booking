<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Réservation</title>

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
                            <h1>Ajouter Réservation</h1>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-7">
                        <div class="booking-form">
                            <form method="get" action="../Chambre/afficher_chambre_disponibles.php">
                                <div class="form-group">
                                    <span class="form-label">Type de Chambre:</span>
                                    <input class="form-control" type="text" id="Type" name="Type" required>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Date de Début:</span>
                                    <input class="form-control" type="date" id="DateDeb" name="DateDeb" required>
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Date de Fin:</span>
                                    <input class="form-control" type="date" id="DateFin" name="DateFin" required>
                                </div>
                                <div class="form-btn">
                                    <button class="submit-btn" type="submit">Envoyer</button>
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