<?php
class Controller {
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    /**
     * Panggil view
     * @param string $view - nama view file
     * @param array $data - data dikirim ke view
     * @param bool $useLayout - apakah pakai layout? (default: true)
     */
    public function view($view, $data = [], $useLayout = true, $role = null) {
    // Ambil role dari session jika tidak diset manual
    if ($role === null && isset($_SESSION['user']['role'])) {
        $role = $_SESSION['user']['role'];
    }

    // Extract data ke variabel
    extract($data);

    // Cek apakah file view tersedia
    $viewPath = "../app/views/$view.php";
    if (!file_exists($viewPath)) {
        require_once '../app/views/errors/404.php';
        exit;
    }

    // Pilih layout berdasarkan role
    if ($useLayout) {
        if ($role === 'admin') {
            require_once '../app/views/layouts/dashboard.php'; // Layout admin
        } else {
            require_once '../app/views/layouts/main.php'; // Layout umum (siswa, asesor)
        }
    }

    // Tampilkan view utama
    require_once $viewPath;
}
    
}
