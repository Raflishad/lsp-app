<?php
class Form
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM FORM");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM FORM WHERE ID_FORM = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($name, $kode)
    {
        $this->db->query("INSERT INTO FORM (KODE_FORM, NAMA_FORM) VALUES (:kode, :name)");
        $this->db->bind(':name', $name);
        $this->db->bind(':kode', $kode);
        return $this->db->execute();
    }

    public function update($id, $name, $kode)
    {
        $this->db->query("UPDATE FORM SET KODE_FORM = :kode, NAMA_FORM = :name WHERE ID_FORM = :id");
        $this->db->bind(':kode', $kode);
        $this->db->bind(':name', $name);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM FORM WHERE ID_FORM = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
