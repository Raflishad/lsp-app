<?php
class Dokumen {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function simpanIdentitas($jenis, $nomor, $filePath) {
        $this->db->query("INSERT INTO kartu_identitas (JENIS_KARTU_IDENTITAS, NOMOR_KARTU_IDENTITAS, URL_KARTU_IDENTITAS)
                        VALUES (:jenis, :nomor, :url)");
        $this->db->bind(':jenis', $jenis);
        $this->db->bind(':nomor', $nomor);
        $this->db->bind(':url', $filePath);
        $this->db->execute();

        return $this->db->lastInsertId(); // Kembalikan ID_KARTU_IDENTITAS
    }

    public function simpanDokumen($id_siswa, $jenis, $url) {
        $this->db->query("INSERT INTO dokumen (ID_SISWA, JENIS_DOKUMEN, URL_DOKUMEN)
                          VALUES (:id_siswa, :jenis, :url)");
        $this->db->bind(':id_siswa', $id_siswa);
        $this->db->bind(':jenis', $jenis);
        $this->db->bind(':url', $url);
        return $this->db->execute();
    }

        public function getIdentitasByUser($id_user) {
        $this->db->query("SELECT ki.* FROM user u 
                        JOIN kartu_identitas ki ON u.ID_KARTU_IDENTITAS = ki.ID_KARTU_IDENTITAS 
                        WHERE u.ID_USER = :id_user");
        $this->db->bind(':id_user', $id_user);
        return $this->db->single();
    }

    public function getDokumenBySiswa($id_siswa) {
        $this->db->query("SELECT * FROM dokumen WHERE ID_SISWA = :id_siswa");
        $this->db->bind(':id_siswa', $id_siswa);
        return $this->db->resultSet();
    }

    public function updateUserIdentitas($id_user, $id_kartu_identitas) {
        $this->db->query("UPDATE user SET ID_KARTU_IDENTITAS = :idk WHERE ID_USER = :idu");
        $this->db->bind(':idk', $id_kartu_identitas);
        $this->db->bind(':idu', $id_user);
        return $this->db->execute();
    }

    public function getIdSiswaByUser($id_user) {
        $this->db->query("SELECT ID_SISWA FROM siswa WHERE ID_USER = :id_user");
        $this->db->bind(':id_user', $id_user);
        $result = $this->db->single();
        return $result['ID_SISWA'] ?? null;
    }

}
