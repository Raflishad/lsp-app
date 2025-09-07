<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class ElemenController extends Controller {

    public function __construct() {
        AuthMiddleware::requireRole('admin');
    }

    public function create() {
        $unitModel = $this->model('Unit');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $nomor  = trim($_POST['nomor'] ?? '');
            $elemen = trim($_POST['elemen'] ?? '');
            $unitId = intval($_POST['unitId'] ?? 0);

            if ($nomor === '' || $elemen === '' || $unitId <= 0) {
                $_SESSION['flash_error'] = 'Data wajib dilengkapi';
                header('Location: ' . BASE_URL . '/ElemenController/create');
                exit;
            }

            $this->model('Elemen')->create($nomor, $elemen, $unitId);
            $_SESSION['flash_success'] = 'Data berhasil ditambahkan.';
            header('Location: ' . BASE_URL . '/AdminController/elemen');
            exit;
        }

        $data['unit'] = $unitModel->getAll();
        $data['title'] = 'Tambah Elemen';
        $this->view('admin/elemen/create', $data);
    }

    public function edit($id) {
        $Model = $this->model('Elemen');
        $unitModel   = $this->model('Unit');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $nomor  = trim($_POST['nomor'] ?? '');
            $elemen = trim($_POST['elemen'] ?? '');
            $unitId = intval($_POST['unitId'] ?? 0);

            if ($nomor === '' || $elemen === '' || $unitId <= 0) {
                $_SESSION['flash_error'] = 'Data elemen wajib dilengkapi';
                header('Location: ' . BASE_URL . '/ElemenController/edit/' . $id);
                exit;
            }

            $Model->update($id, $nomor, $elemen, $unitId);
            $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/elemen');
            exit;
        }

        $elemen = $Model->getById($id);
        if (!$elemen) {
            $_SESSION['flash_error'] = 'Data elemen tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/elemen');
            exit;
        }

        $data['data']  = $elemen;
        $data['unit'] = $unitModel->getAll();
        $data['title'] = 'Edit Elemen';
        $this->view('admin/elemen/edit', $data);
    }

    public function delete($id) {
        CsrfMiddleware::verifyRequest();
        $this->model('Elemen')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/elemen');
        exit;
    }
}
