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
            $role = $this->assignRole($userModel, $user['ID_USER']);

            if (!$role) {
                return $this->redirectWithError('/AuthController', 'Akun belum terdaftar sebagai asesor atau siswa.');
            }

            $user['role'] = $role;
            $_SESSION['user'] = $user;

            return $this->redirect("/{$role}Controller/index");
        }

        return $this->redirectWithError('/AuthController', 'Username atau password salah.');
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
            return $this->redirectWithError('/AuthController/register', 'Registrasi gagal. Username mungkin sudah dipakai.');
        }

        $roleRegistered = match ($role) {
            'asesor' => $userModel->registerAsesor($idUser),
            'siswa'  => $userModel->registerSiswa($idUser),
            default  => false
        };

        if ($roleRegistered) {
            $_SESSION['success'] = "Registrasi berhasil. Silakan login.";
            return $this->redirect('/AuthController');
        }

        return $this->redirectWithError('/AuthController/register', 'Gagal menyimpan role.');
    }

    public function logout() {
        session_destroy();
        $this->redirect('/AuthController');
    }

    private function redirect($path) {
        header('Location: ' . BASE_URL . $path);
        exit;
    }

    private function redirectWithError($path, $message) {
        $_SESSION['error'] = $message;
        return $this->redirect($path);
    }

    private function assignRole($userModel, $idUser) {
        return match (true) {
            $userModel->isAsesor($idUser) => 'asesor',
            $userModel->isSiswa($idUser)  => 'siswa',
            $userModel->isAdmin($idUser)  => 'admin',
            default                       => null,
        };
    }
}
