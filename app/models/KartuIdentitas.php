<?php
class KartuIdentitas {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT * FROM KARTU_IDENTITAS");
        return $this->db->resultSet();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM KARTU_IDENTITAS WHERE ID_KARTU_IDENTITAS = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($nomor, $jenis, $filepath) {
        $this->db->query("INSERT INTO KARTU_IDENTITAS (JENIS_KARTU_IDENTITAS, NOMOR_KARTU_IDENTITAS, URL_KARTU_IDENTITAS) VALUES (:jenis, :nomor, :url)");
        $this->db->bind(':url', $filepath);
        $this->db->bind(':nomor', $nomor);
        $this->db->bind(':jenis', $jenis);
        return $this->db->execute();
    }

    public function update($id, $jenis, $nomor, $filePath = null) {
        if ($filePath) {
            $this->db->query("UPDATE KARTU_IDENTITAS SET 
                                JENIS_KARTU_IDENTITAS = :jenis,
                                NOMOR_KARTU_IDENTITAS = :nomor,
                                URL_KARTU_IDENTITAS   = :url
                              WHERE ID_KARTU_IDENTITAS = :id");
            $this->db->bind(':url', $filePath);
        } else {
            $this->db->query("UPDATE KARTU_IDENTITAS SET 
                                JENIS_KARTU_IDENTITAS = :jenis,
                                NOMOR_KARTU_IDENTITAS = :nomor
                              WHERE ID_KARTU_IDENTITAS = :id");
        }
        $this->db->bind(':jenis', $jenis);
        $this->db->bind(':nomor', $nomor);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id) {
        $this->db->query("DELETE FROM KARTU_IDENTITAS WHERE ID_KARTU_IDENTITAS = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
