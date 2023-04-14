<?php

class ToewijzenModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getNietToegewezen()
    {
        $sql = "SELECT 
                        Voertuig.Id AS VoertuigID
                        ,TypeVoertuig.TypeVoertuig
                        ,Voertuig.Type
                        ,Voertuig.Kenteken
                        ,Voertuig.Bouwjaar
                        ,Voertuig.Brandstof
                        ,TypeVoertuig.Rijbewijscategorie
        FROM Voertuig
        LEFT JOIN VoertuigInstructeur ON Voertuig.Id = VoertuigInstructeur.VoertuigId
        INNER JOIN TypeVoertuig ON TypeVoertuig.Id = Voertuig.TypeVoertuigId
        WHERE VoertuigInstructeur.VoertuigId IS NULL
        ORDER BY TypeVoertuig.Rijbewijscategorie;";

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function getInstructeur($Id)
    {
        $sql = "SELECT 
                    Voornaam
                    ,Tussenvoegsel
                    ,Achternaam
                    ,DatumInDienst
                    ,AantalSterren
        FROM Instructeur
        WHERE Id = $Id;";

        $this->db->query($sql);

        return $this->db->resultSetAssoc();
    }

    public function toewijzen($VoertuigId, $InstructeurId)
    {
        $sql = "INSERT INTO VoertuigInstructeur VALUES (NULL, $VoertuigId, $InstructeurId, sysdate(), 1, NULL, sysdate(6), sysdate(6));";

        $this->db->query($sql);

        return $this->db->resultSet();
        header("refresh:3;../../instructeur");
    }
}
