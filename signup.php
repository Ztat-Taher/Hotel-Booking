<?php
require_once ('connexion.php');
require_once ('Client/classe_client.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CIN = $_POST['CIN'];
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Adresse = $_POST['Adresse'];

    $client = new Client($connexion);

    // Add the client to the database
    $client->addClient($CIN, $Nom, $Prenom, $Adresse);

    // Retrieve the newly added client's data
    $newClientData = $client->getClientByCIN($CIN);

    // Redirect to client dashboard with CIN as a parameter
    header("Location: Client/client_dashboard.php?CIN=" . $newClientData['CIN']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Sign Up</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="CIN">CIN:</label>
                        <input type="text" class="form-control" id="CIN" name="CIN" required>
                    </div>
                    <div class="form-group">
                        <label for="Nom">Nom:</label>
                        <input type="text" class="form-control" id="Nom" name="Nom" required>
                    </div>
                    <div class="form-group">
                        <label for="Prenom">Prénom:</label>
                        <input type="text" class="form-control" id="Prenom" name="Prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="Adresse">Adresse:</label>
                        <input type="text" class="form-control" id="Adresse" name="Adresse" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>