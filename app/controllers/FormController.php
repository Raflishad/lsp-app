<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class FormController extends Controller {

    public function __construct() {
        AuthMiddleware::requireRole('admin');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $name = trim($_POST['name'] ?? '');
            $kode = trim($_POST['kode'] ?? '');

            if ($name === '' || $kode === '') {
                $_SESSION['flash_error'] = 'Form wajib diisi.';
                header('Location: ' . BASE_URL . '/FormController/create');
                exit;
            }

            $this->model('Form')->create($name, $kode);
            $_SESSION['flash_success'] = 'Data berhasil ditambahkan.';
            header('Location: ' . BASE_URL . '/AdminController/form');
            exit;
        }

        $this->view('admin/form/create', ['title' => 'Tambah Form']);
    }

    public function edit($id) {
        $model = $this->model('Form');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $name = trim($_POST['name'] ?? '');
            $kode = trim($_POST['kode'] ?? '');

            if ($name === '' || $kode === '') {
                $_SESSION['flash_error'] = 'Form wajib diisi.';
                header('Location: ' . BASE_URL . '/FormController/edit/' . $id);
                exit;
            }

            $model->update($id, $name, $kode);
            $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/form');
            exit;
        }

        $form = $model->getById($id);
        if (!$form) {
            $_SESSION['flash_error'] = 'Data tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/form');
            exit;
        }

        $this->view('admin/form/edit', [
            'title' => 'Edit Form',
            'id'   => $id,
            'data' => $form
        ]);
    }

    public function delete($id) {
        CsrfMiddleware::verifyRequest();

        $this->model('Form')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/form');
        exit;
    }
}
