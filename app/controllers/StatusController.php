<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class StatusController extends Controller {

    public function __construct() {
        AuthMiddleware::requireRole('admin');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $name = trim($_POST['name'] ?? '');
            if ($name === '') {
                $_SESSION['flash_error'] = 'Status wajib diisi.';
                header('Location: ' . BASE_URL . '/StatusController/create');
                exit;
            }

            $this->model('Status')->create($name);
            $_SESSION['flash_success'] = 'Data berhasil ditambahkan.';
            header('Location: ' . BASE_URL . '/AdminController/status');
            exit;
        }

        $this->view('admin/status/create', ['title' => 'Tambah Status']);
    }

    public function edit($id) {
        $model = $this->model('Status');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $name = trim($_POST['name'] ?? '');
            if ($name === '') {
                $_SESSION['flash_error'] = 'Status wajib diisi.';
                header('Location: ' . BASE_URL . '/StatusController/edit/' . $id);
                exit;
            }

            $model->update($id, $name);
            $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/status');
            exit;
        }

        $status = $model->getById($id);
        if (!$status) {
            $_SESSION['flash_error'] = 'Data tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/status');
            exit;
        }

        $this->view('admin/status/edit', [
            'title' => 'Edit Status',
            'id'   => $id,
            'data' => $status
        ]);
    }

    public function delete($id) {
        CsrfMiddleware::verifyRequest();

        $this->model('Status')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/status');
        exit;
    }
}
