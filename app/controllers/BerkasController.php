<?php 
class BerkasController extends Controller {
    public function index() {
        session_start();

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'siswa') {
            echo "Akses ditolak.";
            exit;
        }

        $data['title'] = 'Berkas';
        $data['nama'] = $_SESSION['user']['NAMA'];
        // Nanti bisa ditambahkan data dokumen dari model
        $this->view('dashboard/berkas', $data);
    }
}