<?php

require_once '../app/middleware/AuthMiddleware.php';
class SiswaController extends Controller {

    public function beranda() {
        AuthMiddleware::requireRole('siswa');

        $data['title'] = 'Beranda Siswa';
        $data['nama'] = $_SESSION['user']['NAMA'];

        $this->view('siswa/beranda', $data);
    }

    public function berkas() {
        AuthMiddleware::requireRole('siswa');
        $data['title'] = 'Berkas Siswa';
        $this->view('siswa/berkas', $data);
    }

    public function asesmen() {
        AuthMiddleware::requireRole('siswa');

        $data['title'] = 'Asesmen Mandiri';
        $this->view('siswa/asesmen', $data);
    }
}

