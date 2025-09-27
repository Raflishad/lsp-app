<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class ProvincesController extends Controller
{

    public function __construct()
    {
        AuthMiddleware::requireRole('admin');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $name = trim($_POST['name'] ?? '');
            if ($name === '') {
                $_SESSION['flash_error'] = 'Provinsi wajib diisi.';
                header('Location: ' . BASE_URL . '/ProvincesController/create');
                exit;
            }

            $this->model('Provinces')->create($name);
            $_SESSION['flash_success'] = 'Data berhasil ditambahkan.';
            header('Location: ' . BASE_URL . '/AdminController/provinces');
            exit;
        }

        $this->view('admin/provinces/create', ['title' => 'Tambah Provinsi']);
    }

    public function edit($id)
    {
        $model = $this->model('Provinces');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $name = trim($_POST['name'] ?? '');
            if ($name === '') {
                $_SESSION['flash_error'] = 'Provinsi wajib diisi.';
                header('Location: ' . BASE_URL . '/ProvincesController/edit/' . $id);
                exit;
            }

            $model->update($id, $name);
            $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/provinces');
            exit;
        }

        $province = $model->getById($id);
        if (!$province) {
            $_SESSION['flash_error'] = 'Data tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/provinces');
            exit;
        }

        $this->view('admin/provinces/edit', [
            'title' => 'Edit Provinsi',
            'id'   => $id,
            'data' => $province
        ]);
    }

    public function delete($id)
    {
        CsrfMiddleware::verifyRequest();
        $this->model('Provinces')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/provinces');
        exit;
    }
}
