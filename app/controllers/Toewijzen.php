<?php

class Toewijzen extends BaseController
{
    private $toewijzenModel;

    public function __construct()
    {
        $this->toewijzenModel = $this->model('ToewijzenModel');
    }

    public function index($id = NULL)
    {
        $result = $this->toewijzenModel->getNietToegewezen($id);
        $instructeur = $this->toewijzenModel->getInstructeur($id);

        if ($result == null) {
            $th = "";
            $rows = "<h2>Alle voertuigen zijn al toegewezen</h2>";
            header("refresh:3;../../instructeur");
        } else {
            $th = "<th>Type Voertuig</th>
            <th>Type</th>
            <th>Kenteken</th>
            <th>Bouwjaar</th>
            <th>Brandstof</th>
            <th>Rijbewijscategorie</th>
            <th>Toewijzen</th>";

            $result = $this->toewijzenModel->getNietToegewezen($id);
            $rows = "";
            foreach ($result as $toewijzen) {
                $rows .= "<tr>
                <td>$toewijzen->TypeVoertuig</td>
                <td>$toewijzen->Type</td>
                <td>$toewijzen->Kenteken</td>
                <td>$toewijzen->Bouwjaar</td>
                <td>$toewijzen->Brandstof</td>
                <td>$toewijzen->Rijbewijscategorie</td>
                <td>
                    <button onclick='toewijzen($toewijzen->Id)'>
                        <i class='bx bx-plus-medical' style='color:#29fd53'></i>
                    </button>
                </td>
                </tr>";
            }
        }


        $data = [
            'title' => 'Alle beschikbare voertuigen',
            'rows' => $rows,
            'fullName' => $instructeur['Voornaam'] . ' ' . $instructeur['Tussenvoegsel'] . ' ' . $instructeur['Achternaam'],
            'did' => $instructeur['DatumInDienst'],
            'TotalStars' => $instructeur['AantalSterren'],
            'th' => $th
        ];

        $this->view('toewijzen/toewijzen', $data);
    }
}
