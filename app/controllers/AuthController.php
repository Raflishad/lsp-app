<?php
require_once '../app/middleware/CsrfMiddleware.php';

class AuthController extends Controller {

    public function __construct()
    {
        CsrfMiddleware::verifyRequest();
    }

    public function index() {
        $data['title'] = 'Login';
        $this->view('auth/login', $data, false);
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = $this->model('User');
        $user = $userModel->getByUsername($username);

        if ($user && password_verify($password, $user['PASSWORD'])) {
            $idUser = $user['ID_USER'];
            $role = null;

            if ($userModel->isAsesor($idUser)) {
                $role = 'asesor';
            } elseif ($userModel->isSiswa($idUser)) {
                $role = 'siswa';
            } elseif ($userModel->isAdmin($idUser)) {
                $role = 'admin';
            }

            if (!$role) {
                $_SESSION['error'] = 'Akun belum terdaftar sebagai asesor atau siswa.';
                return $this->redirect('/AuthController');
            }

            $user['role'] = $role;
            $_SESSION['user'] = $user;

            return $this->redirect("/{$role}Controller/index");
        }

        $_SESSION['error'] = 'Username atau password salah.';
        return $this->redirect('/AuthController');
    }

    public function register() {
        $data['title'] = 'Register';
        $this->view('auth/register', $data, false);
    }

    public function store() {
        $username = $_POST['username'] ?? '';
        $password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);
        $nama     = $_POST['nama'] ?? '';
        $email    = $_POST['email'] ?? '';
        $role     = $_POST['role'] ?? '';

        $userModel = $this->model('User');
        $idUser = $userModel->registerUser($username, $password, $nama, $email);

        if (!$idUser) {
            $_SESSION['error'] = "Registrasi gagal. Username mungkin sudah dipakai.";
            return $this->redirect('/AuthController/register');
        }

        $roleRegistered = false;
        if ($role === 'asesor') {
            $roleRegistered = $userModel->registerAsesor($idUser);
        } elseif ($role === 'siswa') {
            $roleRegistered = $userModel->registerSiswa($idUser);
        }

        if ($roleRegistered) {
            $_SESSION['success'] = "Registrasi berhasil. Silakan login.";
            return $this->redirect('/AuthController');
        }

        $_SESSION['error'] = "Gagal menyimpan role.";
        return $this->redirect('/AuthController/register');
    }

    public function logout() {
        session_destroy();
        $this->redirect('/AuthController');
    }

    private function redirect($path) {
        header('Location: ' . BASE_URL . $path);
        exit;
    }
} 