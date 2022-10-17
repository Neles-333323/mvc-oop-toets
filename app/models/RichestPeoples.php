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

    public function createRichestPeople($post) {
        $this->db->query('INSERT INTO richestpeople (Name, Networth, MyAge, Company) VALUES (:name, :networth, :myage, :company)');
        $this->db->bind(':name', $post['Name']);
        $this->db->bind(':networth', $post['Networth']);
        $this->db->bind(':myage', $post['MyAge']);
        $this->db->bind(':company', $post['Company']);
        return $this->db->execute();
    }

    public function updateRichestPeople($post) {
        $this->db->query('UPDATE richestpeople SET Name = :name, Networth = :networth, MyAge = :myage, Company = :company WHERE Id = :id');
        $this->db->bind(':name', $post['Name']);
        $this->db->bind(':networth', $post['Networth']);
        $this->db->bind(':myage', $post['MyAge']);
        $this->db->bind(':company', $post['Company']);
        $this->db->bind(':id', $post['id']);
        return $this->db->execute();
    }

    public function getSingleRichestPeople($id) {
        $this->db->query('SELECT * FROM richestpeople WHERE Id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}