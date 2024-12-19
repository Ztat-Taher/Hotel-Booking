<?php
require_once ('..\connexion.php');
require_once ('classe_chambre.php');

if (isset($_GET['NumCh']) && !empty($_GET['NumCh'])) {
    $chambre = new Chambre($connexion);
    $chambreInfo = $chambre->getChambreByNumber($_GET['NumCh']);
    if ($chambreInfo) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier Chambre</title>

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
                                    <h1>Modifier Chambre</h1>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-pull-7">
                                <div class="booking-form">
                                    <form action="" method="post">
                                        <input type="hidden" name="NumCh" value="<?php echo $chambreInfo['NumCh']; ?>">
                                        <div class="form-group">
                                            <span class="form-label">Type:</span>
                                            <input class="form-control" type="text" id="Type" name="Type"
                                                value="<?php echo $chambreInfo['Type']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <span class="form-label">Prix:</span>
                                            <input class="form-control" type="text" id="Prix" name="Prix"
                                                value="<?php echo $chambreInfo['Prix']; ?>" required>
                                        </div>
                                        <div class="form-btn">
                                            <button class="submit-btn" type="submit">Modifier Chambre</button>
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
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $chambre->updateChambre($_GET['NumCh'], $_POST['Type'], $_POST['Prix']);
            header("Location: afficher_chambre.php");
            exit();
        }
    } else {
        header("Location: afficher_chambre.php");
        exit();
    }
} else {
    header("Location: afficher_chambre.php");
    exit();
}
?>