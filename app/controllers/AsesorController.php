<?php

require_once '../app/middleware/AuthMiddleware.php';
class AsesorController extends Controller {
    
    private $user;

    public function __construct() {
        AuthMiddleware::requireRole('asesor');
        $this->user = $_SESSION['user'];
    }

    public function index() {  

        $data['title'] = 'Beranda Asesor';
        $data['nama'] = $_SESSION['user']['NAMA'];

        $this->view('asesor/beranda', $data);
    }

    public function verifikasi() {

        $data['title'] = 'Verifikasi Siswa';
        $this->view('asesor/verifikasi', $data);
    }

}
