<?php
class Skema
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("
            SELECT s.*, pg.NAMA_PROGRAM_KEAHLIAN, l.LEVEL
            FROM SKEMA s
            JOIN PROGRAM_KEAHLIAN pg ON s.ID_PROGRAM_KEAHLIAN = pg.ID_PROGRAM_KEAHLIAN
            JOIN LEVEL l ON s.ID_LEVEL = l.ID_LEVEL
            ORDER BY s.KODE_SKEMA
        ");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM SKEMA WHERE ID_SKEMA = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($kode, $kategori, $name, $programId, $levelId)
    {
        $this->db->query("INSERT INTO SKEMA (KODE_SKEMA, KATEGORI_SKEMA, NAMA_SKEMA, ID_PROGRAM_KEAHLIAN, ID_LEVEL) VALUES (:kode, :kategori, :name, :programId, :levelId)");
        $this->db->bind(':kode', $kode);
        $this->db->bind(':kategori', $kategori);
        $this->db->bind(':name', $name);
        $this->db->bind(':programId', $programId);
        $this->db->bind(':levelId', $levelId);
        return $this->db->execute();
    }

    public function update($id, $kode, $kategori, $name, $programId, $levelId)
    {
        $this->db->query("UPDATE SKEMA 
                          SET KODE_SKEMA = :kode, KATEGORI_SKEMA = :kategori, NAMA_SKEMA = :name, ID_PROGRAM_KEAHLIAN = :programId, ID_LEVEL = :levelId 
                          WHERE ID_SKEMA = :id");
        $this->db->bind(':kode', $kode);
        $this->db->bind(':kategori', $kategori);
        $this->db->bind(':name', $name);
        $this->db->bind(':programId', $programId);
        $this->db->bind(':levelId', $levelId);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM SKEMA WHERE ID_SKEMA = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
