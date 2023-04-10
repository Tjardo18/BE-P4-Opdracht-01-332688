<?php

class Voertuig extends BaseController
{
    private $voertuigModel;

    public function __construct()
    {
        $this->voertuigModel = $this->model('VoertuigModel');
    }

    public function index($id = NULL)
    {
        $result = $this->voertuigModel->getVoertuigen($id);
        $instructeur = $this->voertuigModel->getInstructeur($id);
        
        
        $rows = "";
        foreach ($result as $voertuig) {
            $rows .= "<tr>
            <td>$voertuig->TypeVoertuig</td>
            <td>$voertuig->Type</td>
            <td>$voertuig->Kenteken</td>
            <td>$voertuig->Bouwjaar</td>
            <td>$voertuig->Brandstof</td>
            <td>$voertuig->Rijbewijscategorie</td>
            </tr>";
        }
        
        
        $data = [
            'title' => 'Door instructeur gebruikte voertuigen',
            'rows' => $rows,
            'fullName' => $instructeur['Voornaam'] . ' ' . $instructeur['Tussenvoegsel'] . ' ' . $instructeur['Achternaam'],
            'did' => $instructeur['DatumInDienst'],
            'TotalStars' => $instructeur['AantalSterren']
        ];
        
        $this->view('voertuig/voertuig', $data);
    }
}
