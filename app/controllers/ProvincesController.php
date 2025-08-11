<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class ProvincesController extends Controller {

    public function __construct() {
        AuthMiddleware::requireRole('admin');
        CsrfMiddleware::verifyRequest();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $this->model('Provinces')->create($name);
            $_SESSION['flash_success'] = 'Data provinsi berhasil ditambahkan.';
            header('Location: ' . BASE_URL . '/AdminController/provinces');
        } else {
            $this->view('admin/provinces/create');
        }
    }

    public function edit($id) {
        $model = $this->model('Provinces');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $model->update($id, $name);
            $_SESSION['flash_success'] = 'Data provinsi berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/provinces');
            exit;
        } else {
            $province = $model->getById($id);
            if (!$province) {
                die("Provinsi tidak ditemukan");
            }
            $this->view('admin/provinces/edit', [
                'id' => $id,
                'data' => $province
            ]);
        }
    }

    public function delete($id) {
        $this->model('Provinces')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/provinces');
    }
}
