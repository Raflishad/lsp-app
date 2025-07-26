<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getByUsername(string $username): ?array {
        $this->db->query("SELECT * FROM USER WHERE USERNAME = :username");
        $this->db->bind(':username', $username);
        return $this->db->single();
    }

    public function isAsesor(int $id_user): bool {
        return $this->hasRole('ASESOR', $id_user);
    }

    public function isSiswa(int $id_user): bool {
        return $this->hasRole('SISWA', $id_user);
    }

    public function isAdmin(int $id_user): bool {
        return $this->hasRole('ADMIN', $id_user);
    }

    private function hasRole(string $table, int $id_user): bool {
        $this->db->query("SELECT 1 FROM {$table} WHERE ID_USER = :id LIMIT 1");
        $this->db->bind(':id', $id_user);
        return (bool) $this->db->single();
    }

    public function registerUser(string $username, string $password, string $nama, string $email): ?int {
        if ($this->getByUsername($username)) {
            return null; // Username sudah dipakai
        }

        $this->db->query("
            INSERT INTO USER (USERNAME, PASSWORD, NAMA, EMAIL) 
            VALUES (:username, :password, :nama, :email)
        ");
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':email', $email);

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        }

        return null;
    }

    public function registerAsesor(int $id_user): bool {
        if ($this->isAsesor($id_user)) return false;

        $this->db->query("INSERT INTO ASESOR (ID_USER, ROLE) VALUES (:id, 'asesor')");
        $this->db->bind(':id', $id_user);
        return $this->db->execute();
    }

    public function registerSiswa(int $id_user): bool {
        if ($this->isSiswa($id_user)) return false;

        $this->db->query("INSERT INTO SISWA (ID_USER) VALUES (:id)");
        $this->db->bind(':id', $id_user);
        return $this->db->execute();
    }
}
