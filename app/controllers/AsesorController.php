<?php

require_once '../app/middleware/AuthMiddleware.php';
class AsesorController extends Controller {

    public function beranda() {
        AuthMiddleware::requireRole('asesor');   

        $data['title'] = 'Beranda Asesor';
        $data['nama'] = $_SESSION['user']['NAMA'];

        $this->view('asesor/beranda', $data);
    }

    public function verifikasi() {
        AuthMiddleware::requireRole('asesor');

        $data['title'] = 'Verifikasi Siswa';
        $this->view('asesor/verifikasi', $data);
    }

}
