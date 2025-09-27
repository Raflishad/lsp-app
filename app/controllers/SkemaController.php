<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class SkemaController extends Controller
{

    public function __construct()
    {
        AuthMiddleware::requireRole('admin');
    }

    public function create()
    {
        $pgModel = $this->model('ProgramKeahlian');
        $levelModel = $this->model('Level');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $kode = trim($_POST['kode'] ?? '');
            $kategori = trim($_POST['kategori'] ?? '');
            $name = trim($_POST['name'] ?? '');
            $pgId = intval($_POST['pgId'] ?? 0);
            $levelId = intval($_POST['levelId'] ?? 0);

            if ($kode === '' || $kategori === '' || $name === '' || $pgId <= 0 || $levelId <= 0) {
                $_SESSION['flash_error'] = 'Data wajib dilengkapi.';
                header('Location: ' . BASE_URL . '/SkemaController/create');
                exit;
            }

            $this->model('Skema')->create($kode, $kategori, $name, $pgId, $levelId);
            $_SESSION['flash_success'] = 'Data berhasil ditambahkan.';
            header('Location: ' . BASE_URL . '/AdminController/skema');
            exit;
        }

        $data['programKeahlian'] = $pgModel->getAll();
        $data['level'] = $levelModel->getAll();
        $data['title'] = 'Tambah Skema';
        $this->view('admin/skema/create', $data);
    }

    public function edit($id)
    {
        $model = $this->model('Skema');
        $pgModel = $this->model('ProgramKeahlian');
        $levelModel = $this->model('Level');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();
            $kode = trim($_POST['kode'] ?? '');
            $kategori = trim($_POST['kategori'] ?? '');
            $name = trim($_POST['name'] ?? '');
            $pgId = intval($_POST['pgId'] ?? 0);
            $levelId = intval($_POST['levelId'] ?? 0);

            if ($kode === '' || $kategori === '' || $name === '' || $pgId <= 0 || $levelId <= 0) {
                $_SESSION['flash_error'] = 'Data wajib dilengkapi.';
                header('Location: ' . BASE_URL . '/SkemaController/edit/' . $id);
                exit;
            }

            $model->update($id, $kode, $kategori, $name, $pgId, $levelId);
            $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/skema');
            exit;
        }

        $skema = $model->getById($id);
        if (!$skema) {
            $_SESSION['flash_error'] = 'Skema tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/skema');
            exit;
        }

        $data['data'] = $skema;
        $data['programKeahlian'] = $pgModel->getAll();
        $data['level'] = $levelModel->getAll();
        $data['title'] = 'Edit Skema';
        $this->view('admin/skema/edit', $data);
    }

    public function delete($id)
    {
        CsrfMiddleware::verifyRequest();
        $this->model('Skema')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/skema');
        exit;
    }
}
