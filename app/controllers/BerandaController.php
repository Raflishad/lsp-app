<?php
class BerandaController extends Controller {

    public function index() {
        session_start();

        // Jika belum login, redirect ke login
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/AuthController");
            exit;
        }

        $user = $_SESSION['user'];

        // Tampilkan dashboard sesuai role
        if ($user['role'] === 'asesor') {
            $data['title'] = 'Dashboard Asesor';
            $data['nama'] = $user['NAMA'];
            $this->view('dashboard/asesor', $data);

        } elseif ($user['role'] === 'siswa') {
            $data['title'] = 'Dashboard Siswa';
            $data['nama'] = $user['NAMA'];
            $this->view('dashboard/siswa', $data);

        } else {
            echo "<p>Role tidak dikenali.</p>";
        }
    }
}
