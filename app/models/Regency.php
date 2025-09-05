<?php
class Regency {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Ambil semua regency dengan join provinsi
    public function getAll() {
        $this->db->query("
            SELECT r.*, p.NAME_PROVINCES 
            FROM REGENCIES r
            JOIN PROVINCES p ON r.ID_PROVINCES = p.ID_PROVINCES
            ORDER BY p.NAME_PROVINCES, r.NAME_REGENCIES
        ");
        return $this->db->resultSet();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM REGENCIES WHERE ID_REGENCIES = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($name, $provinceId) {
        $this->db->query("INSERT INTO REGENCIES (NAME_REGENCIES, ID_PROVINCES) VALUES (:name, :province_id)");
        $this->db->bind(':name', $name);
        $this->db->bind(':province_id', $provinceId);
        return $this->db->execute();
    }

    public function update($id, $name, $provinceId) {
        $this->db->query("UPDATE REGENCIES 
                          SET NAME_REGENCIES = :name, ID_PROVINCES = :province_id 
                          WHERE ID_REGENCIES = :id");
        $this->db->bind(':name', $name);
        $this->db->bind(':province_id', $provinceId);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id) {
        $this->db->query("DELETE FROM REGENCIES WHERE ID_REGENCIES = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
