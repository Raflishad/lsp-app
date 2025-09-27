<?php
class Provinces
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM PROVINCES");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM PROVINCES WHERE ID_PROVINCES = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($name)
    {
        $this->db->query("INSERT INTO PROVINCES (NAME_PROVINCES) VALUES (:name)");
        $this->db->bind(':name', $name);
        return $this->db->execute();
    }

    public function update($id, $name)
    {
        $this->db->query("UPDATE PROVINCES SET NAME_PROVINCES = :name WHERE ID_PROVINCES = :id");
        $this->db->bind(':name', $name);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM PROVINCES WHERE ID_PROVINCES = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
