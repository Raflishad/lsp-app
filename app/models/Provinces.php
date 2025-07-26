<?php
class Provinces {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'lsp-app'); // ganti sesuai koneksi
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM PROVINCES");
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM PROVINCES WHERE ID_PROVINCES = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($name) {
        $stmt = $this->db->prepare("INSERT INTO PROVINCES (NAME_PROVINCES) VALUES (?)");
        $stmt->bind_param("s", $name);
        return $stmt->execute();
    }

    public function update($id, $name) {
        $stmt = $this->db->prepare("UPDATE PROVINCES SET NAME_PROVINCES = ? WHERE ID_PROVINCES = ?");
        $stmt->bind_param("si", $name, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM PROVINCES WHERE ID_PROVINCES = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
