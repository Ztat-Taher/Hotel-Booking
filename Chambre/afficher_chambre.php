<?php
require_once ('..\connexion.php');
require_once ('classe_chambre.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des chambres</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: transparent;
            color: #495057;
        }
        h2 {
            font-weight: bold;
            color: #343a40;
            text-transform: uppercase;
        }
        .card {
            border: none;
            border-radius: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .card-header {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            background-color: #007bff;
            color: white;
            font-weight: bold;
            padding: 20px;
            text-align: center;
            margin-bottom: 0;
        }
        .card-body {
            padding: 20px;
        }
        .icon {
            font-size: 24px;
            margin-right: 10px;
            color: #007bff;
        }
        .btn {
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-5">Liste des chambres</h2>
        <div class="row">
            <?php
            $chambre = new Chambre($connexion);
            $chambres = $chambre->getAllChambres();
            foreach ($chambres as $chambre) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<div class="card-header">';
                echo 'Numéro de Chambre: ' . $chambre['NumCh'];
                echo '</div>';
                echo '<div class="card-body">';
                echo '<p class="card-text"><i class="fas fa-bed icon"></i><strong>Type:</strong> ' . $chambre['Type'] . '</p>';
                echo '<p class="card-text"><i class="fas fa-money-bill-wave icon"></i><strong>Prix:</strong> ' . $chambre['Prix'] . '</p>';
                echo '<div class="text-center">';
                echo '<a href="modifier_chambre.php?NumCh=' . $chambre['NumCh'] . '" class="btn btn-primary mr-2"><i class="fas fa-edit"></i> Modifier</a>';
                echo '<a href="supprimer_chambre.php?NumCh=' . $chambre['NumCh'] . '" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="add-client mt-5 text-center">
            <a href="ajouter_chambre.php" class="btn btn-primary btn-lg"><i class="fas fa-plus"></i> Ajouter une chambre</a>
        </div>
    </div>
</body>
</html>
