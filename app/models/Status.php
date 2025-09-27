<?php
class Status
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM STATUS");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM STATUS WHERE ID_STATUS = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($name)
    {
        $this->db->query("INSERT INTO STATUS (STATUS) VALUES (:name)");
        $this->db->bind(':name', $name);
        return $this->db->execute();
    }

    public function update($id, $name)
    {
        $this->db->query("UPDATE STATUS SET STATUS = :name WHERE ID_STATUS = :id");
        $this->db->bind(':name', $name);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM STATUS WHERE ID_STATUS = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
