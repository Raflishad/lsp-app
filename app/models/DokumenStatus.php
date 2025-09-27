<?php
class DokumenStatus
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("
            SELECT 
                s.ID_SISWA,
                s.NISN,
                MAX(CASE WHEN d.JENIS_DOKUMEN = 'pas_foto' THEN d.URL_DOKUMEN END) AS PAS_FOTO,
                MAX(CASE WHEN d.JENIS_DOKUMEN = 'sertifikat' THEN d.URL_DOKUMEN END) AS SERTIFIKAT,
                MAX(CASE WHEN d.JENIS_DOKUMEN = 'transkrip' THEN d.URL_DOKUMEN END) AS TRANSKRIP
            FROM siswa s
            LEFT JOIN dokumen d ON s.ID_SISWA = d.ID_SISWA
            GROUP BY s.ID_SISWA, s.NISN
            ORDER BY s.ID_SISWA
        ");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM dokumen WHERE ID_DOKUMEN = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function update($id, $url)
    {
        $this->db->query("UPDATE dokumen SET URL_DOKUMEN = :url WHERE ID_DOKUMEN = :id");
        $this->db->bind(':url', $url);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM dokumen WHERE ID_SISWA = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
