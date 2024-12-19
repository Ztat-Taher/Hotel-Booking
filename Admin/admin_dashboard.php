<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: linear-gradient(90deg, #007bff, #0056b3);
        }
        .navbar-brand, .nav-link, .navbar-toggler-icon {
            color: white !important;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5em;
        }
        .nav-link {
            margin-right: 1em;
        }
        .nav-link:hover {
            color: #ffc107 !important;
        }
        .nav-link.active {
            color: #ffc107 !important;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-primary:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
        .iframe-container {
            position: relative;
            height: calc(100vh - 56px);
            background: url('../img/background.jpg') no-repeat center center;
            background-size: cover;
        }
        iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            background-color: rgba(0, 0, 0, 0.5); /* Ensure iframe content is readable */
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
        footer a {
            color: #ffc107;
            text-decoration: none;
        }
        footer a:hover {
            color: #e0a800;
        }
        .footer-icon {
            font-size: 1.5em;
            margin: 0 10px;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#"><i class="fas fa-tachometer-alt"></i> Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" onclick="loadPage('../Client/afficher_client.php', this)"><i class="fas fa-users"></i> Afficher Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" onclick="loadPage('../Chambre/afficher_chambre.php', this)"><i class="fas fa-bed"></i> Afficher Chambres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" onclick="loadPage('../Reservation/afficher_reservation.php', this)"><i class="fas fa-calendar-alt"></i> Afficher Réservations</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-dark" href="..\logout.php"><i class="fas fa-sign-out-alt"></i> Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <div class="iframe-container">
        <iframe id="content-frame" src="../Client/afficher_client.php"></iframe>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-md-left">
                    <p>&copy; 2024 Admin Dashboard. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-md-right">
                    <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook footer-icon"></i></a>
                    <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter footer-icon"></i></a>
                    <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram footer-icon"></i></a>
                    <a href="mailto:info@admindashboard.com"><i class="fas fa-envelope footer-icon"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom Script to load pages and set active class -->
    <script>
        function loadPage(page, element) {
            document.getElementById('content-frame').src = page;
            var links = document.querySelectorAll('.nav-link');
            links.forEach(function(link) {
                link.classList.remove('active');
            });
            element.classList.add('active');
        }
    </script>
</body>

</html>
