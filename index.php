<?php
require_once ('connexion.php');
require_once ('Client/classe_client.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Admin login authentication
  if (isset($_POST['admin_username']) && isset($_POST['admin_password'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    // Check admin credentials (replace with your admin credentials)
    $admin_username_db = 'admin';
    $admin_password_db = 'admin';

    if ($admin_username === $admin_username_db && $admin_password === $admin_password_db) {
      // Redirect to admin dashboard
      header("Location: Admin/admin_dashboard.php");
      exit();
    } else {
      echo "<div class='alert alert-danger' role='alert'>Invalid admin credentials.</div>";
    }
  }

  // Client login authentication
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $client = new Client($connexion);
    $clientData = $client->getClientByCIN($username); // Use CIN as username

    if ($clientData && $clientData['CIN'] === $password) {
      // Redirect to client dashboard with CIN as a parameter
      header("Location: Client/client_dashboard.php?CIN=" . $clientData['CIN']);
      exit();
    } else {
      echo "<div class='alert alert-danger' role='alert'>Invalid client credentials.</div>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: url('https://source.unsplash.com/1600x900/?hotel-room') no-repeat center center/cover;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .login-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      position: relative;
    }

    .login-container h2 {
      font-weight: 600;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .form-group label {
      font-weight: 500;
    }

    .form-control {
      border-radius: 0.375rem;
    }

    .btn-primary,
    .btn-secondary {
      border-radius: 0.375rem;
      padding: 0.75rem;
      font-size: 1rem;
      transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover,
    .btn-secondary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .vl {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      height: 100%;
      border-left: 2px solid #ddd;
    }

    .vl-innertext {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
    }

    @media screen and (max-width: 768px) {
      .vl {
        display: none;
      }

      .vl-innertext {
        display: none;
      }
    }

    @media (prefers-color-scheme: dark) {
      body {
        background: url('https://source.unsplash.com/1600x900/?hotel-room') no-repeat center center/cover;
        background-color: #121212;
        color: #ffffff;
      }

      .login-container {
        background: rgba(33, 33, 33, 0.95);
      }

      .form-control {
        background-color: #424242;
        border-color: #424242;
        color: #ffffff;
      }

      .btn-primary,
      .btn-secondary {
        background-color: #1e88e5;
        border-color: #1e88e5;
      }

      .btn-primary:hover,
      .btn-secondary:hover {
        background-color: #1565c0;
        border-color: #1565c0;
      }
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2>Log In</h2>
    <form action="" method="post">
      <div class="form-group">
        <label for="username">Username (CIN)</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
      </div>
      <div class="form-group">
        <label for="password">Password (CIN)</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Log In</button>
    </form>
    <div class="text-center my-3">
      <div class="hl"></div>
      <span class="hl-innertext">or</span>
    </div>
    <form action="" method="post">
      <div class="form-group">
        <label for="admin_username">Admin Username</label>
        <input type="text" class="form-control" id="admin_username" name="admin_username"
          placeholder="Enter Admin Username" required>
      </div>
      <div class="form-group">
        <label for="admin_password">Admin Password</label>
        <input type="password" class="form-control" id="admin_password" name="admin_password"
          placeholder="Enter Admin Password" required>
      </div>
      <button type="submit" class="btn btn-secondary btn-block">Log in as Admin</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>