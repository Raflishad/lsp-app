<?php
class ProgramKeahlian
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM PROGRAM_KEAHLIAN");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM PROGRAM_KEAHLIAN WHERE ID_PROGRAM_KEAHLIAN = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($name)
    {
        $this->db->query("INSERT INTO PROGRAM_KEAHLIAN (NAMA_PROGRAM_KEAHLIAN) VALUES (:name)");
        $this->db->bind(':name', $name);
        return $this->db->execute();
    }

    public function update($id, $name)
    {
        $this->db->query("UPDATE PROGRAM_KEAHLIAN SET NAMA_PROGRAM_KEAHLIAN = :name WHERE ID_PROGRAM_KEAHLIAN = :id");
        $this->db->bind(':name', $name);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM PROGRAM_KEAHLIAN WHERE ID_PROGRAM_KEAHLIAN = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
