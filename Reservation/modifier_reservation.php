<?php
require_once ('..\connexion.php');
require_once ('classe_reservation.php');

if (isset($_GET['reservation_id']) && !empty($_GET['reservation_id'])) {
    $reservation = new Reservation($connexion);
    $reservationInfo = $reservation->getReservationById($_GET['reservation_id']);
    if ($reservationInfo) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier Reservation</title>

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
                                    <h1>Modifier Reservation</h1>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-pull-7">
                                <div class="booking-form">
                                    <form action="" method="post">
                                        <input type="hidden" name="reservation_id"
                                            value="<?php echo $reservationInfo['reservation_id']; ?>">
                                        <div class="form-group">
                                            <span class="form-label">Room Type:</span>
                                            <input class="form-control" type="text" id="room_type" name="room_type"
                                                value="<?php echo $reservationInfo['room_type']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <span class="form-label">Check-In Date:</span>
                                            <input class="form-control" type="date" id="check_in" name="check_in"
                                                value="<?php echo $reservationInfo['check_in']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <span class="form-label">Check-Out Date:</span>
                                            <input class="form-control" type="date" id="check_out" name="check_out"
                                                value="<?php echo $reservationInfo['check_out']; ?>" required>
                                        </div>
                                        <div class="form-btn">
                                            <button class="submit-btn" type="submit">Modifier Reservation</button>
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
            $reservation->updateReservation($_GET['NumRes'], $_POST['room_type'], $_POST['check_in'], $_POST['check_out']);
            header("Location: afficher_reservation.php");
            exit();
        }
    } else {
        header("Location: afficher_reservation.php");
        exit();
    }
} else {
    header("Location: afficher_reservation.php");
    exit();
}
?>