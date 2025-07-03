<?php
class AuthController extends Controller {

    public function index() {
        $data['title'] = 'Login';
        $this->view('auth/login', $data, false);
    }

    public function login() {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = $this->model('User');
        $user = $userModel->getByUsername($username);

        if ($user && password_verify($password, $user['PASSWORD'])) {
            $idUser = $user['ID_USER'];

            if ($userModel->isAsesor($idUser)) {
                $user['role'] = 'asesor';
            } elseif ($userModel->isSiswa($idUser)) {
                $user['role'] = 'siswa';
            } else {
                $_SESSION['error'] = 'Akun belum terdaftar sebagai asesor atau siswa.';
                header('Location: ' . BASE_URL . '/AuthController');
                exit;
            }

            $_SESSION['user'] = $user;
            header('Location: ' . BASE_URL . '/BerandaController');
        } else {
            $_SESSION['error'] = 'Username atau password salah.';
            header('Location: ' . BASE_URL . '/AuthController');
        }
    }

    public function register() {
        $data['title'] = 'Register';
        $this->view('auth/register', $data, false);
    }

    public function store() {
        session_start();

        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $role = $_POST['role']; // asesor atau siswa

        $userModel = $this->model('User');

        // Simpan ke tabel USER
        $idUser = $userModel->registerUser($username, $password, $nama, $email);

        if ($idUser) {
            if ($role === 'asesor') {
                $userModel->registerAsesor($idUser);
            } elseif ($role === 'siswa') {
                $userModel->registerSiswa($idUser);
            }

            $_SESSION['success'] = "Registrasi berhasil. Silakan login.";
            header('Location: ' . BASE_URL . '/AuthController');
        } else {
            $_SESSION['error'] = "Registrasi gagal. Username mungkin sudah dipakai.";
            header('Location: ' . BASE_URL . '/AuthController/register');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "/AuthController");
    }
}
