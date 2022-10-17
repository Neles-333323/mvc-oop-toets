<?php

class RichestPeoples {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getRichestPeople() {
        $this->db->query('SELECT * FROM richestpeople');
        return $this->db->resultSet();
    }

}