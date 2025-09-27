<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class UnitController extends Controller
{

    public function __construct()
    {
        AuthMiddleware::requireRole('admin');
    }

    public function create()
    {
        $skemaModel = $this->model('Skema');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $kode = trim($_POST['kode'] ?? '');
            $judul = trim($_POST['judul'] ?? '');
            $jenis = trim($_POST['jenis'] ?? '');
            $skemaId = intval($_POST['skemaId'] ?? 0);

            if ($kode === '' || $judul === '' || $jenis === '' || $skemaId <= 0) {
                $_SESSION['flash_error'] = 'Data wajib dilengkapi.';
                header('Location: ' . BASE_URL . '/UnitController/create');
                exit;
            }

            $this->model('Unit')->create($kode, $judul, $jenis, $skemaId);
            $_SESSION['flash_success'] = 'Data berhasil ditambahkan.';
            header('Location: ' . BASE_URL . '/AdminController/unit');
            exit;
        }

        $data['skema'] = $skemaModel->getAll();
        $data['title'] = 'Tambah Unit';
        $this->view('admin/unit/create', $data);
    }

    public function edit($id)
    {
        $model = $this->model('Unit');
        $skemaModel = $this->model('Skema');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();
            $kode = trim($_POST['kode'] ?? '');
            $judul = trim($_POST['judul'] ?? '');
            $jenis = trim($_POST['jenis'] ?? '');
            $skemaId = intval($_POST['skemaId'] ?? 0);

            if ($kode === '' || $judul === '' || $jenis === '' || $skemaId <= 0) {
                $_SESSION['flash_error'] = 'Data wajib dilengkapi.';
                header('Location: ' . BASE_URL . '/UnitController/edit/' . $id);
                exit;
            }

            $model->update($id, $kode, $judul, $jenis, $skemaId);
            $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/unit');
            exit;
        }

        $unit = $model->getById($id);
        if (!$unit) {
            $_SESSION['flash_error'] = 'Unit tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/unit');
            exit;
        }

        $data['data'] = $unit;
        $data['skema'] = $skemaModel->getAll();
        $data['title'] = 'Edit Unit';
        $this->view('admin/unit/edit', $data);
    }

    public function delete($id)
    {
        CsrfMiddleware::verifyRequest();
        $this->model('Unit')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/unit');
        exit;
    }
}
