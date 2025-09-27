<?php
class Elemen
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("
            SELECT e.*, u.KODE_UNIT 
            FROM ELEMEN e
            JOIN UNIT u ON e.ID_UNIT = u.ID_UNIT
            ORDER BY e.NOMOR_ELEMEN
        ");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM ELEMEN WHERE ID_ELEMEN = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($nomor, $elemen, $unitId)
    {
        $this->db->query("INSERT INTO ELEMEN (NOMOR_ELEMEN, ELEMEN, ID_UNIT) VALUES (:nomor, :elemen, :unitId)");
        $this->db->bind(':nomor', $nomor);
        $this->db->bind(':elemen', $elemen);
        $this->db->bind(':unitId', $unitId);
        return $this->db->execute();
    }

    public function update($id, $nomor, $elemen, $unitId)
    {
        $this->db->query("UPDATE ELEMEN 
                          SET NOMOR_ELEMEN = :nomor, ELEMEN = :elemen, ID_UNIT = :unitId 
                          WHERE ID_ELEMEN = :id");
        $this->db->bind(':nomor', $nomor);
        $this->db->bind(':elemen', $elemen);
        $this->db->bind(':unitId', $unitId);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM ELEMEN WHERE ID_ELEMEN = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
