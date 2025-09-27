<?php
class Pertanyaan
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("
            SELECT p.*, f.NAMA_FORM, e.ELEMEN
            FROM PERTANYAAN p
            JOIN FORM f ON p.ID_FORM = f.ID_FORM
            JOIN ELEMEN e ON p.ID_ELEMEN = e.ID_ELEMEN
            ORDER BY p.PERTANYAAN
        ");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM PERTANYAAN WHERE ID_PERTANYAAN = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($pertanyaan, $nomor, $status, $formId, $elemenId)
    {
        $this->db->query("INSERT INTO PERTANYAAN (PERTANYAAN, NOMOR_PERTANYAAN, STATUS_PERTANYAAN, ID_FORM, ID_ELEMEN) VALUES (:pertanyaan, :nomor, :status, :formId, :elemenId)");
        $this->db->bind(':pertanyaan', $pertanyaan);
        $this->db->bind(':nomor', $nomor);
        $this->db->bind(':status', $status);
        $this->db->bind(':formId', $formId);
        $this->db->bind(':elemenId', $elemenId);
        return $this->db->execute();
    }

    public function update($id, $pertanyaan, $nomor, $status, $formId, $elemenId)
    {
        $this->db->query("UPDATE PERTANYAAN 
                          SET PERTANYAAN = :pertanyaan, NOMOR_PERTANYAAN = :nomor, STATUS_PERTANYAAN = :status, ID_FORM = :formId, ID_ELEMEN = :elemenId
                          WHERE ID_PERTANYAAN = :id");
        $this->db->bind(':pertanyaan', $pertanyaan);
        $this->db->bind(':nomor', $nomor);
        $this->db->bind(':status', $status);
        $this->db->bind(':formId', $formId);
        $this->db->bind(':elemenId', $elemenId);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM PERTANYAAN WHERE ID_PERTANYAAN = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
