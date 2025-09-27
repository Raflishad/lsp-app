<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class ProgramKeahlianController extends Controller
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
                $_SESSION['flash_error'] = 'Program Keahlian wajib diisi.';
                header('Location: ' . BASE_URL . '/ProgramKeahlianController/create');
                exit;
            }

            $this->model('ProgramKeahlian')->create($name);
            $_SESSION['flash_success'] = 'Data berhasil ditambahkan.';
            header('Location: ' . BASE_URL . '/AdminController/programKeahlian');
            exit;
        }

        $this->view('admin/programKeahlian/create', ['title' => 'Tambah Program Keahlian']);
    }

    public function edit($id)
    {
        $model = $this->model('ProgramKeahlian');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $name = trim($_POST['name'] ?? '');
            if ($name === '') {
                $_SESSION['flash_error'] = 'Program Keahlian wajib diisi.';
                header('Location: ' . BASE_URL . '/ProgramKeahlianController/edit/' . $id);
                exit;
            }

            $model->update($id, $name);
            $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/programKeahlian');
            exit;
        }

        $programKeahlian = $model->getById($id);
        if (!$programKeahlian) {
            $_SESSION['flash_error'] = 'Data tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/programKeahlian');
            exit;
        }

        $this->view('admin/programKeahlian/edit', [
            'title' => 'Edit Program Keahlian',
            'id'   => $id,
            'data' => $programKeahlian
        ]);
    }

    public function delete($id)
    {
        CsrfMiddleware::verifyRequest();

        $this->model('ProgramKeahlian')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/programKeahlian');
        exit;
    }
}
