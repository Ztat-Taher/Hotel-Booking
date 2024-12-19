<?php
class Reservation
{
    private $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    public function addReservation($CIN, $NumCh, $DateDeb, $DateFin)
    {
        $query = "INSERT INTO reservation (CIN, NumCh, DateDeb, DateFin) VALUES ('$CIN', '$NumCh', '$DateDeb', '$DateFin')";
        $this->connexion->query($query);
    }

    public function updateReservation($NumRes, $NumCh, $DateDeb, $DateFin)
    {
        $query = "UPDATE reservation SET NumCh = '$NumCh', DateDeb = '$DateDeb', DateFin = '$DateFin' WHERE NumRes = '$NumRes'";
        $this->connexion->query($query);
    }

    public function deleteReservation($NumRes)
    {
        $query = "DELETE FROM reservation WHERE NumRes = '$NumRes'";
        $this->connexion->query($query);
    }

    public function getAllReservations()
    {
        $query = "SELECT * FROM reservation";
        $statement = $this->connexion->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReservationById($NumRes)
    {
        $query = "SELECT * FROM reservation WHERE NumRes = '$NumRes'";
        $stmt = $this->connexion->query($query);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAvailableChambresForDateRange($type, $dateDeb, $dateFin)
    {
        $query = "SELECT * FROM chambre WHERE Type = '$type' AND NumCh NOT IN 
                  (SELECT NumCh FROM reservation 
                   WHERE ('$dateDeb' BETWEEN DateDeb AND DateFin)
                   OR ('$dateFin' BETWEEN DateDeb AND DateFin)
                   OR (DateDeb BETWEEN '$dateDeb' AND '$dateFin')
                   OR (DateFin BETWEEN '$dateDeb' AND '$dateFin'))";
        $statement = $this->connexion->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getClientReservations($CIN)
    {
        try {
            $query = "SELECT * FROM reservation WHERE CIN = :CIN";
            $statement = $this->connexion->prepare($query);
            $statement->bindParam(':CIN', $CIN, PDO::PARAM_INT);
            $statement->execute();
            $reservations = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $reservations;
        } catch (PDOException $e) {
            // Handle database error
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>