<?php

class Zangeres extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('ZangeresModel');
    }

    public function index()
    {
        $result = $this->zangeresModel->getZangeressen();

        $rows = "";
        foreach ($result as $zangeres) {
            $rows .= "<tr>
                        <td>$zangeres->Naam</td>
                        <td>$zangeres->NettoWaarde</td>
                        <td>$zangeres->Land</td>
                        <td>$zangeres->Mobiel</td>
                        <td>$zangeres->Leeftijd</td>
                      </tr>";
        }

        $data = [
            'title' => 'Top 5 rijkste zangeressen ter wereld',
            'rows' => $rows
        ];

        $this->view('zangeres/zangeres', $data);
    }
}
