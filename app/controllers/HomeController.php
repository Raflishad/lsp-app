<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ' . BASE_URL . '/AuthController');
    exit;
}

class HomeController extends Controller {
    public function index() {
        $data['title'] = 'Beranda';
        $this->view('home', $data); // otomatis akan cari ../app/views/home.php
    }
}
