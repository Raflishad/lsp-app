<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class LevelController extends Controller {

    public function __construct() {
        AuthMiddleware::requireRole('admin');
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $level = trim($_POST['level'] ?? '');
            if ($level === '') {
                $_SESSION['flash_error'] = 'Level wajib diisi.';
                header('Location: ' . BASE_URL . '/LevelController/create');
                exit;
            }

            $this->model('Level')->create($level);
            $_SESSION['flash_success'] = 'Data level berhasil ditambahkan.';
            header('Location: ' . BASE_URL . '/AdminController/level');
            exit;
        }

        $this->view('admin/level/create');
    }

    public function edit($id) {
        $model = $this->model('Level');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $level = trim($_POST['level'] ?? '');
            if ($level === '') {
                $_SESSION['flash_error'] = 'Level wajib diisi.';
                header('Location: ' . BASE_URL . '/LevelController/edit/' . $id);
                exit;
            }

            $model->update($id, $level);
            $_SESSION['flash_success'] = 'Data level berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/level');
            exit;
        }

        $level = $model->getById($id);
        if (!$level) {
            $_SESSION['flash_error'] = 'Level tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/level');
            exit;
        }

        $this->view('admin/level/edit', [
            'id'   => $id,
            'data' => $level
        ]);
    }

    public function delete($id) {
        CsrfMiddleware::verifyRequest();

        $this->model('Level')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/level');
        exit;
    }
}
