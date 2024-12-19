<?php
class Client
{
    private $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    public function addClient($CIN, $Nom, $Prenom, $Adresse)
    {
        $query = "INSERT INTO client (CIN, Nom, Prenom, Adresse) VALUES ('$CIN', '$Nom', '$Prenom', '$Adresse')";
        $this->connexion->query($query);
    }

    public function deleteClient($CIN)
    {
        $query = "DELETE FROM client WHERE CIN = '$CIN'";
        $this->connexion->query($query);
    }

    public function updateClient($CIN, $Nom, $Prenom, $Adresse)
    {
        $query = "UPDATE client SET Nom = '$Nom', Prenom = '$Prenom', Adresse = '$Adresse' WHERE CIN = '$CIN'";
        $this->connexion->query($query);
    }

    public function getAllClients()
    {
        $query = "SELECT * FROM client";
        $statement = $this->connexion->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getClientByCIN($CIN)
    {
        $query = "SELECT * FROM client WHERE CIN = '$CIN'";
        $stmt = $this->connexion->query($query);
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        return $client;
    }
    public function getClientUsername($CIN)
    {
        $query = "SELECT Nom, Prenom FROM client WHERE CIN = '$CIN'";
        $stmt = $this->connexion->query($query);
        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($client) {
            return $client['Nom'] . $client['Prenom'];
        } else {
            return null; // Or handle the case when no client is found
        }
    }

}

?>