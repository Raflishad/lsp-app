<?php

require_once '../app/middleware/AuthMiddleware.php';

class SiswaController extends Controller {
    private $user;
    private $dokumenModel;
    private $id_user;
    private $id_siswa;

    public function __construct() {
        AuthMiddleware::requireRole('siswa');
        $this->user         = $_SESSION['user'];
        $this->id_user      = $this->user['ID_USER'];
        $this->dokumenModel = $this->model('Dokumen');
        $this->id_siswa     = $this->dokumenModel->getIdSiswaByUser($this->id_user);
    }

    public function index() {
        $data = $this->getDataTemplate('Beranda Siswa');
        $this->view('siswa/beranda', $data);
    }

    public function berkas() {
        $data = $this->getDataTemplate('Berkas Siswa');
        $this->view('siswa/berkas', $data);
    }

    public function asesmen() {
        $data['title'] = 'Asesmen Mandiri';
        $this->view('siswa/asesmen', $data);
    }

    /**
     * Mengambil data umum untuk beranda dan berkas siswa
     */
    private function getDataTemplate(string $title): array {
        return [
            'title'     => $title,
            'nama'      => $this->user['NAMA'] ?? '',
            'identitas' => $this->dokumenModel->getIdentitasByUser($this->id_user),
            'dokumen'   => $this->dokumenModel->getDokumenBySiswa($this->id_siswa)
        ];
    }
}
