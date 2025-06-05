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
    public function view($view, $data = [], $useLayout = true) {
        extract($data);
        $viewPath = '../app/views/' . $view . '.php';

        if (file_exists($viewPath)) {
            if ($useLayout) {
                // Jika pakai layout
                require_once '../app/views/layouts/main.php';
            } else {
                // Tanpa layout, langsung tampilkan file view
                require_once $viewPath;
            }
        } else {
            echo "<p style='color:red;'>View <strong>$view</strong> tidak ditemukan.</p>";
        }
    }
}
