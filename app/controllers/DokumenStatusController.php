<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class DokumenStatusController extends Controller {

    public function __construct() {
        AuthMiddleware::requireRole('admin');
    }

    public function edit($id) {
        $model = $this->model('Dokumen');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $url = trim($_POST['url'] ?? '');

            $model->update($id, $url);
            $_SESSION['flash_success'] = 'Dokumen berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/dokumen');
            exit;
        }

        $dokumen = $model->getById($id);
        if (!$dokumen) {
            $_SESSION['flash_error'] = 'Data tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/dokumen');
            exit;
        }

        $data['data'] = $dokumen;
        $data['title'] = 'Edit Dokumen';
        $this->view('admin/dokumen/edit', $data);
    }

    public function delete($id) {
        CsrfMiddleware::verifyRequest();
        $this->model('Dokumen')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/dokumen');
        exit;
    }
}
