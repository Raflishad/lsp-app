<?php
class Unit
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("
            SELECT u.*, s.NAMA_SKEMA 
            FROM UNIT u
            JOIN SKEMA s ON u.ID_SKEMA = s.ID_SKEMA
            ORDER BY u.KODE_UNIT
        ");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM UNIT WHERE ID_UNIT = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($kode, $judul, $jenis, $skemaId)
    {
        $this->db->query("INSERT INTO UNIT (KODE_UNIT, JUDUL_UNIT, JENIS_UNIT, ID_SKEMA) VALUES (:kode, :judul, :jenis, :skemaId)");
        $this->db->bind(':kode', $kode);
        $this->db->bind(':judul', $judul);
        $this->db->bind(':jenis', $jenis);
        $this->db->bind(':skemaId', $skemaId);
        return $this->db->execute();
    }

    public function update($id, $kode, $judul, $jenis, $skemaId)
    {
        $this->db->query("UPDATE UNIT 
                          SET KODE_UNIT = :kode, JUDUL_UNIT = :judul, JENIS_UNIT = :jenis, ID_SKEMA = :skemaId 
                          WHERE ID_UNIT = :id");
        $this->db->bind(':kode', $kode);
        $this->db->bind(':judul', $judul);
        $this->db->bind(':jenis', $jenis);
        $this->db->bind(':skemaId', $skemaId);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM UNIT WHERE ID_UNIT = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
