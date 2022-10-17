<?php 

class Landingpages extends Controller
{
    public function __construct() 
    {
        
    }

    public function index()
    {
        header("Location: " . URLROOT . "richestpeople/index");
    }
}