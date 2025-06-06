<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getByUsername($username) {
        $stmt = $this->db->query("SELECT * FROM USER WHERE USERNAME = '$username'");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function isAsesor($id_user) {
        $stmt = $this->db->query("SELECT * FROM ASESOR WHERE ID_USER = $id_user");
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    public function isSiswa($id_user) {
        $stmt = $this->db->query("SELECT * FROM SISWA WHERE ID_USER = $id_user");
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    public function registerUser($username, $password, $nama, $email) {
        // Cek apakah username sudah dipakai
        $check = $this->getByUsername($username);
        if ($check) return false;

        // Masukkan ke USER
        $sql = "INSERT INTO USER (USERNAME, PASSWORD, NAMA, EMAIL) VALUES ('$username', '$password', '$nama', '$email')";
        $this->db->query($sql);

        // Ambil ID terakhir
        return $this->db->query("SELECT LAST_INSERT_ID()")->fetchColumn();
    }

    public function registerAsesor($id_user) {
        return $this->db->query("INSERT INTO ASESOR (ID_USER, ROLE) VALUES ($id_user, 'asesor')");
    }

    public function registerSiswa($id_user) {
        return $this->db->query("INSERT INTO SISWA (ID_USER) VALUES ($id_user)");
    }
}
