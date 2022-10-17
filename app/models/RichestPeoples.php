<?php

class RichestPeoples {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getRichestPeople() {
        $this->db->query('SELECT * FROM richestpeople ORDER BY Networth DESC');
        return $this->db->resultSet();
    }

    public function deleteRichestPeople($id) {
        $this->db->query('DELETE FROM richestpeople WHERE Id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}