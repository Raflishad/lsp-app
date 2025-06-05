<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Ambil user berdasarkan username
    public function getByUsername($username) {
        $stmt = $this->db->query("SELECT * FROM USER WHERE USERNAME = '$username'");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cek apakah user ini adalah asesor
    public function isAsesor($id_user) {
        $stmt = $this->db->query("SELECT * FROM ASESOR WHERE ID_USER = $id_user");
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    // Cek apakah user ini adalah siswa
    public function isSiswa($id_user) {
        $stmt = $this->db->query("SELECT * FROM SISWA WHERE ID_USER = $id_user");
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
}
