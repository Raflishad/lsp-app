<?php
class Controller {
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function view($view, $data = []) {
        extract($data); // biar $title dll langsung tersedia di layout
        $viewPath = '../app/views/' . $view . '.php';

        // Kirim path view sebagai parameter ke layout
        require_once '../app/views/layouts/main.php';
    }
}
