<?php
class Level
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM LEVEL");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM LEVEL WHERE ID_LEVEL = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($level)
    {
        $this->db->query("INSERT INTO LEVEL (LEVEL) VALUES (:level)");
        $this->db->bind(':level', $level);
        return $this->db->execute();
    }

    public function update($id, $level)
    {
        $this->db->query("UPDATE LEVEL SET LEVEL = :level WHERE ID_LEVEL = :id");
        $this->db->bind(':level', $level);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM LEVEL WHERE ID_LEVEL = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
