<?php

class Instructeur extends BaseController
{
    private $instructeurModel;

    public function __construct()
    {
        $this->instructeurModel = $this->model('InstructeurModel');
    }

    public function index()
    {
        $result = $this->instructeurModel->getInstructeurs();

        $rows = "";
        foreach ($result as $instructeur) {
            $rows .= "<tr>
                        <td>$instructeur->Naam</td>
                        <td>$instructeur->NettoWaarde</td>
                        <td>$instructeur->Land</td>
                        <td>$instructeur->Mobiel</td>
                        <td>$instructeur->Leeftijd</td>
                      </tr>";
        }

        $data = [
            'title' => 'Top 5 beste instructeurs ter wereld',
            'rows' => $rows
        ];

        $this->view('instructeur/instructeur', $data);
    }
}
