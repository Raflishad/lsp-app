<?php
class AuthController extends Controller {

    // Menampilkan form login
    public function index() {
        $data['title'] = 'Login';
        $this->view('auth/login', $data);
    }

    // Proses login
    public function login() {
        session_start();

        // Ambil input dari form login
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Panggil model User
        $userModel = $this->model('User');
        $user = $userModel->getByUsername($username);

        // Validasi password
        if ($user && password_verify($password, $user['PASSWORD'])) {
            $idUser = $user['ID_USER'];

            // Deteksi peran berdasarkan ID_USER di tabel lain
            if ($userModel->isAsesor($idUser)) {
                $user['role'] = 'asesor';
            } elseif ($userModel->isSiswa($idUser)) {
                $user['role'] = 'siswa';
            } else {
                $_SESSION['error'] = 'Akun belum terdaftar sebagai asesor atau siswa.';
                header('Location: ' . BASE_URL . '/AuthController');
                exit;
            }

            // Simpan user ke session
            $_SESSION['user'] = $user;
            header('Location: ' . BASE_URL . '/HomeController');
        } else {
            $_SESSION['error'] = 'Username atau password salah.';
            header('Location: ' . BASE_URL . '/AuthController');
        }
    }

    // Logout
    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . '/AuthController');
    }
}
