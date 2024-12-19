<?php
require_once ('..\connexion.php');
require_once ('classe_client.php');
if (isset($_GET['CIN']) && !empty($_GET['CIN'])) {
    $client = new Client($connexion);
    $clientInfo = $client->getClientByCIN($_GET['CIN']);
    if ($clientInfo) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier Client</title>

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
                                    <h1>Modifier Client</h1>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-pull-7">
                                <div class="booking-form">
                                    <form action="" method="post">
                                        <input type="hidden" name="CIN" value="<?php echo $clientInfo['CIN']; ?>">
                                        <div class="form-group">
                                            <span class="form-label">Nom:</span>
                                            <input class="form-control" type="text" id="Nom" name="Nom"
                                                value="<?php echo $clientInfo['Nom']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <span class="form-label">Prénom:</span>
                                            <input class="form-control" type="text" id="Prenom" name="Prenom"
                                                value="<?php echo $clientInfo['Prenom']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <span class="form-label">Adresse:</span>
                                            <input class="form-control" type="text" id="Adresse" name="Adresse"
                                                value="<?php echo $clientInfo['Adresse']; ?>" required>
                                        </div>
                                        <div class="form-btn">
                                            <button class="submit-btn" type="submit">Modifier Client</button>
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
            $client->updateClient($_GET['CIN'], $_POST['Nom'], $_POST['Prenom'], $_POST['Adresse']);
            header("Location: afficher_client.php");
            exit();
        }
    } else {
        header("Location: afficher_client.php");
        exit();
    }
} else {
    header("Location: afficher_client.php");
    exit();
}
?>