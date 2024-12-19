<?php
class Chambre
{
    private $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    public function addChambre($NumCh, $Type, $Prix)
    {
        $query = "INSERT INTO chambre (NumCh, Type, Prix) VALUES ('$NumCh', '$Type', '$Prix')";
        $this->connexion->query($query);
    }

    public function deleteChambre($NumCh)
    {
        $query = "DELETE FROM chambre WHERE NumCh = '$NumCh'";
        $this->connexion->query($query);
    }

    public function updateChambre($NumCh, $Type, $Prix)
    {
        $query = "UPDATE chambre SET Type = '$Type', Prix = '$Prix' WHERE NumCh = '$NumCh'";
        $this->connexion->query($query);
    }

    public function getAllChambres()
    {
        $query = "SELECT * FROM chambre";
        $statement = $this->connexion->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChambreByNumber($NumCh)
    {
        $query = "SELECT * FROM chambre WHERE NumCh = '$NumCh'";
        $stmt = $this->connexion->query($query);
        $chambre = $stmt->fetch(PDO::FETCH_ASSOC);
        return $chambre;
    }

    public function getAvailableChambres()
    {
        // Since there is no 'status' column, all rooms can be considered available
        return $this->getAllChambres();
    }
    public function getAvailableChambresForDateRange($type, $dateDeb, $dateFin)
    {
        // Query to fetch available rooms for the specified date range and type
        $query = "SELECT * FROM chambre WHERE Type = '$type' AND NumCh NOT IN 
              (SELECT NumCh FROM reservation 
               WHERE ('$dateDeb' BETWEEN DateDeb AND DateFin)
               OR ('$dateFin' BETWEEN DateDeb AND DateFin)
               OR (DateDeb BETWEEN '$dateDeb' AND '$dateFin')
               OR (DateFin BETWEEN '$dateDeb' AND '$dateFin'))";

        $statement = $this->connexion->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>