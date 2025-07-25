<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getByUsername($username) {
        $this->db->query("SELECT * FROM USER WHERE USERNAME = :username");
        $this->db->bind(':username', $username);
        return $this->db->single();
    }

    public function isAsesor($id_user) {
        $this->db->query("SELECT * FROM ASESOR WHERE ID_USER = :id");
        $this->db->bind(':id', $id_user);
        return $this->db->single() ? true : false;
    }

    public function isSiswa($id_user) {
        $this->db->query("SELECT * FROM SISWA WHERE ID_USER = :id");
        $this->db->bind(':id', $id_user);
        return $this->db->single() ? true : false;
    }

    public function isAdmin($id_user) {
        $this->db->query("SELECT * FROM ADMIN WHERE ID_USER = :id");
        $this->db->bind(':id', $id_user);
        return $this->db->single() ? true : false;
    }

    public function registerUser($username, $password, $nama, $email) {
        // Cek apakah username sudah dipakai
        if ($this->getByUsername($username)) return false;

        // Masukkan ke USER
        $this->db->query("INSERT INTO USER (USERNAME, PASSWORD, NAMA, EMAIL) VALUES (:username, :password, :nama, :email)");
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':email', $email);
        $this->db->execute();

        return $this->db->lastInsertId(); // return ID_USER baru
    }

    public function registerAsesor($id_user) {
        $this->db->query("INSERT INTO ASESOR (ID_USER, ROLE) VALUES (:id, 'asesor')");
        $this->db->bind(':id', $id_user);
        return $this->db->execute();
    }

    public function registerSiswa($id_user) {
        $this->db->query("INSERT INTO SISWA (ID_USER) VALUES (:id)");
        $this->db->bind(':id', $id_user);
        return $this->db->execute();
    }
}
