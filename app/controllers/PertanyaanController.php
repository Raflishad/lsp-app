<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class PertanyaanController extends Controller
{

    public function __construct()
    {
        AuthMiddleware::requireRole('admin');
    }

    public function create()
    {
        $formModel   = $this->model('Form');
        $elemenModel = $this->model('Elemen');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $pertanyaan = trim($_POST['pertanyaan'] ?? '');
            $nomor      = trim($_POST['nomor'] ?? '');
            $status     = trim($_POST['status'] ?? '');
            $formId     = intval($_POST['formId'] ?? 0);
            $elemenId   = intval($_POST['elemenId'] ?? 0);

            if ($pertanyaan === '' || $nomor === '' || $status === '' || $formId <= 0 || $elemenId <= 0) {
                $_SESSION['flash_error'] = 'Data wajib dilengkapi';
                header('Location: ' . BASE_URL . '/PertanyaanController/create');
                exit;
            }

            $this->model('Pertanyaan')->create($pertanyaan, $nomor, $status, $formId, $elemenId);
            $_SESSION['flash_success'] = 'Data berhasil ditambahkan.';
            header('Location: ' . BASE_URL . '/AdminController/pertanyaan');
            exit;
        }

        $data['form']   = $formModel->getAll();
        $data['elemen'] = $elemenModel->getAll();
        $data['title']  = 'Tambah Pertanyaan';
        $this->view('admin/pertanyaan/create', $data);
    }

    public function edit($id)
    {
        $model       = $this->model('Pertanyaan');
        $formModel   = $this->model('Form');
        $elemenModel = $this->model('Elemen');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $pertanyaan = trim($_POST['pertanyaan'] ?? '');
            $nomor      = trim($_POST['nomor'] ?? '');
            $status     = trim($_POST['status'] ?? '');
            $formId     = intval($_POST['formId'] ?? 0);
            $elemenId   = intval($_POST['elemenId'] ?? 0);

            if ($pertanyaan === '' || $nomor === '' || $status === '' || $formId <= 0 || $elemenId <= 0) {
                $_SESSION['flash_error'] = 'Data wajib dilengkapi';
                header('Location: ' . BASE_URL . '/PertanyaanController/edit/' . $id);
                exit;
            }

            $model->update($id, $pertanyaan, $nomor, $status, $formId, $elemenId);
            $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/pertanyaan');
            exit;
        }

        $pertanyaan = $model->getById($id);
        if (!$pertanyaan) {
            $_SESSION['flash_error'] = 'Data tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/pertanyaan');
            exit;
        }

        $data['data']   = $pertanyaan;
        $data['form']   = $formModel->getAll();
        $data['elemen'] = $elemenModel->getAll();
        $data['title']  = 'Edit Pertanyaan';
        $this->view('admin/pertanyaan/edit', $data);
    }

    public function delete($id)
    {
        CsrfMiddleware::verifyRequest();
        $this->model('Pertanyaan')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/pertanyaan');
        exit;
    }
}
