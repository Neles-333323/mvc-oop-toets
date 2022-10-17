<?php 
    
class RichestPeople extends Controller
{
    private $richestPeople;
    public function __construct() 
    {
        $this->richestPeople = $this->model('RichestPeoples');
    }

    public function index() 
    {
        $record = $this->richestPeople->getRichestPeople();

        $rows = '';
        foreach($record as $value) {
            $rows .= "<tr>
                        <td>$value->Name</td>
                        <td>$value->Networth</td>
                        <td>$value->MyAge</td>
                        <td>$value->Company</td>
                        <td><a href='" . URLROOT . "richestpeople/delete/$value->Id'>Delete</a></td>
                    </tr>";
        }


        $data = [
            'rows' => $rows
        ];

        $this->view('richestpeople/index', $data);
    }

    public function delete($id = null) {
        $this->richestPeople->deleteRichestPeople($id);
        header("Location: " . URLROOT . "richestpeople/delete") ;
    }
}
