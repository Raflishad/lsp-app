<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT * FROM user ORDER BY ID_USER ASC");
        return $this->db->resultSet();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM user WHERE ID_USER = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($data) {
        $this->db->query("INSERT INTO user 
            (USERNAME, EMAIL, PASSWORD, NAMA, ALAMAT, KODE_POS, NOMOR_HP, TANGGAL_LAHIR, JENIS_KELAMIN, ID_KARTU_IDENTITAS, ID_REGENCIES) 
            VALUES 
            (:username, :email, :password, :nama, :alamat, :kode_pos, :nomor_hp, :tanggal_lahir, :jenis_kelamin, :id_kartu_identitas, :id_regencies)");

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->bind(':kode_pos', $data['kode_pos']);
        $this->db->bind(':nomor_hp', $data['nomor_hp']);
        $this->db->bind(':tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind(':jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind(':id_kartu_identitas', $data['id_kartu_identitas']);
        $this->db->bind(':id_regencies', $data['id_regencies']);

        return $this->db->execute();
    }

    public function update($id, $data) {
        $this->db->query("UPDATE user SET 
            USERNAME = :username, 
            NAMA = :nama, 
            EMAIL = :email, 
            ALAMAT = :alamat, 
            KODE_POS = :kode_pos, 
            NOMOR_HP = :nomor_hp, 
            TANGGAL_LAHIR = :tanggal_lahir, 
            JENIS_KELAMIN = :jenis_kelamin, 
            ID_KARTU_IDENTITAS = :id_kartu_identitas, 
            ID_REGENCIES = :id_regencies
            WHERE ID_USER = :id");

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->bind(':kode_pos', $data['kode_pos']);
        $this->db->bind(':nomor_hp', $data['nomor_hp']);
        $this->db->bind(':tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind(':jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind(':id_kartu_identitas', $data['id_kartu_identitas']);
        $this->db->bind(':id_regencies', $data['id_regencies']);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function delete($id) {
        $this->db->query("DELETE FROM user WHERE ID_USER = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
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
            return null; 
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
