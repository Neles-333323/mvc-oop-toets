<?php

class RichestPeople extends Controller
{
    private $richestPeopleModel;
    public function __construct()
    {
        $this->richestPeopleModel = $this->model('RichestPeoples');
    }

    public function index()
    {
        $record = $this->richestPeopleModel->getRichestPeople();

        $rows = '';
        foreach ($record as $value) {
            $rows .= "<tr>
                        <td>$value->Name</td>
                        <td>$value->Networth</td>
                        <td>$value->MyAge</td>
                        <td>$value->Company</td>
                        <td><a href='" . URLROOT . "RichestPeople/update/$value->Id'>Update</a></td>
                        <td><a href='" . URLROOT . "richestpeople/delete/$value->Id'>Delete</a></td>
                    </tr>";
        }


        $data = [
            'rows' => $rows
        ];

        $this->view('richestpeople/index', $data);
    }

    public function delete($id)
    {
        if (!$id) {
            header('Location: ' . URLROOT . 'RichestPeople/index');
        }

        $this->richestPeopleModel->deleteRichestPeople($id);

        $data = [
            'title' => 'Record is succesvol verwijderd',
        ];

        $this->view('richestpeople/delete', $data);

        header("Refresh: 2; url=" . URLROOT . "RichestPeople/index");
    }

    public function create() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->richestPeopleModel->createRichestPeople($_POST);
            header("Location: " . URLROOT . "RichestPeople/index") ;
        } else {
            $this->view('richestpeople/create');
        }
    }

    public function update($id = null) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->richestPeopleModel->updateRichestPeople($_POST);
            header("Location: " . URLROOT . "RichestPeople/index") ;
        } else {
            if(!$id) {
                header("Location: " . URLROOT . "RichestPeople/index") ;
            }
            $row = $this->richestPeopleModel->getSingleRichestPeople($id);
            
            $data = [
                'row' => $row
            ];
        }
        $this->view('richestpeople/update', $data);
    }
}
