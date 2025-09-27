<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class RegencyController extends Controller
{

    public function __construct()
    {
        AuthMiddleware::requireRole('admin');
    }

    public function create()
    {
        $provinceModel = $this->model('Provinces');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $name = trim($_POST['name'] ?? '');
            $provinceId = intval($_POST['province_id'] ?? 0);

            if ($name === '' || $provinceId <= 0) {
                $_SESSION['flash_error'] = 'Nama dan provinsi wajib diisi.';
                header('Location: ' . BASE_URL . '/RegencyController/create');
                exit;
            }

            $this->model('Regency')->create($name, $provinceId);
            $_SESSION['flash_success'] = 'Data berhasil ditambahkan.';
            header('Location: ' . BASE_URL . '/AdminController/regency');
            exit;
        }

        $data['provinces'] = $provinceModel->getAll();
        $data['title'] = 'Tambah Kabupaten';
        $this->view('admin/regency/create', $data);
    }

    public function edit($id)
    {
        $model = $this->model('Regency');
        $provinceModel = $this->model('Provinces');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();
            $name = trim($_POST['name'] ?? '');
            $provinceId = intval($_POST['province_id'] ?? 0);

            if ($name === '' || $provinceId <= 0) {
                $_SESSION['flash_error'] = 'Nama dan provinsi wajib diisi.';
                header('Location: ' . BASE_URL . '/RegencyController/edit/' . $id);
                exit;
            }

            $model->update($id, $name, $provinceId);
            $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/regency');
            exit;
        }

        $regency = $model->getById($id);
        if (!$regency) {
            $_SESSION['flash_error'] = 'Kabupaten tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/regency');
            exit;
        }

        $data['data'] = $regency;
        $data['provinces'] = $provinceModel->getAll();
        $data['title'] = 'Edit Kabupaten';
        $this->view('admin/regency/edit', $data);
    }

    public function delete($id)
    {
        CsrfMiddleware::verifyRequest();
        $this->model('Regency')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/regency');
        exit;
    }
}
