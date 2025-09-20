<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

// Tambahkan autoload phpspreadsheet
require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class UserController extends Controller {

    public function __construct() {
        AuthMiddleware::requireRole('admin');
    }

    public function create() {
        $kartuIdentitasModel = $this->model('KartuIdentitas');
        $regencyModel = $this->model('Regency');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        CsrfMiddleware::verifyRequest();

        $data = [
            'username' => trim($_POST['username']),
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'nama' => trim($_POST['nama']),
            'email' => trim($_POST['email']),
            'alamat' => trim($_POST['alamat']) ?: null,
            'kode_pos' => trim($_POST['kode_pos']) ?: null,
            'nomor_hp' => trim($_POST['nomor_hp']) ?: null,
            'tanggal_lahir' => $_POST['tanggal_lahir'] ?? null,
            'jenis_kelamin' => $_POST['jenis_kelamin'] ?? '',
            'id_kartu_identitas' => intval($_POST['id_kartu_identitas']) ?: null,
            'id_regencies' => intval($_POST['id_regencies']) ?: null
        ];

        $this->model('User')->create($data);
        $_SESSION['flash_success'] = 'User berhasil ditambahkan.';
        header('Location: ' . BASE_URL . '/AdminController/user');
        exit;
    }

        $data['kartu_identitas'] = $kartuIdentitasModel->getAll();
        $data['regencies'] = $regencyModel->getAll();
        $data['title'] = 'Tambah User';
        $this->view('admin/user/create', $data);
    }

    public function edit($id) {
        $model = $this->model('User');
        $kartuIdentitasModel = $this->model('KartuIdentitas');
        $regencyModel = $this->model('Regency');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            $data = [
                'username' => trim($_POST['username']),
                'nama' => trim($_POST['nama']),
                'email' => trim($_POST['email']),
                'alamat' => trim($_POST['alamat']) ?: null,
                'kode_pos' => trim($_POST['kode_pos']) ?: null,
                'nomor_hp' => trim($_POST['nomor_hp']) ?: null,
                'tanggal_lahir' => $_POST['tanggal_lahir'] ?? null,
                'jenis_kelamin' => $_POST['jenis_kelamin'] ?? '',
                'id_kartu_identitas' => intval($_POST['id_kartu_identitas']) ?: null,
                'id_regencies' => intval($_POST['id_regencies']) ?: null
            ];

            $model->update($id, $data);
            $_SESSION['flash_success'] = 'User berhasil diperbarui.';
            header('Location: ' . BASE_URL . '/AdminController/user');
            exit;
        }

        $user = $model->getById($id);
        if (!$user) {
            $_SESSION['flash_error'] = 'User tidak ditemukan.';
            header('Location: ' . BASE_URL . '/AdminController/user');
            exit;
        }

        $data['kartu_identitas'] = $kartuIdentitasModel->getAll();
        $data['regencies'] = $regencyModel->getAll();
        $data['data'] = $user;
        $data['title'] = 'Edit User';
        $this->view('admin/user/edit', $data);
    }

    public function delete($id) {
        CsrfMiddleware::verifyRequest();
        $this->model('User')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/user');
        exit;
    }

    public function import() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                $_SESSION['flash_error'] = 'File tidak valid.';
                header('Location: ' . BASE_URL . '/UserController/import');
                exit;
            }

            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $file = $_FILES['file']['tmp_name'];
            $userModel = $this->model('User');

            if ($ext === 'csv') {
                // === Import CSV ===
                $handle = fopen($file, "r");
                fgetcsv($handle, 1000, ",");
                while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $this->saveUserRow($row, $userModel);
                }
                fclose($handle);
            } else {
                // === Import Excel (XLSX / XLS) ===
                $spreadsheet = IOFactory::load($file);
                $sheet = $spreadsheet->getActiveSheet();
                $rows = $sheet->toArray();

                foreach (array_slice($rows, 1) as $row) {
                    $this->saveUserRow($row, $userModel);
                }
            }

            $_SESSION['flash_success'] = 'Data user berhasil diimport.';
            header('Location: ' . BASE_URL . '/AdminController/user');
            exit;
        }

        $data['title'] = 'Import User';
        $this->view('admin/user/import', $data);
    }

    private function saveUserRow($row, $userModel) {
        $data = [
            'username' => trim($row[0] ?? ''),
            'email' => trim($row[1] ?? ''),
            'password' => !empty($row[2]) ? password_hash(trim($row[2]), PASSWORD_DEFAULT) : null,
            'nama' => trim($row[3] ?? ''),
            'alamat' => trim($row[4] ?? '') ?: null,
            'kode_pos' => trim($row[5] ?? '') ?: null,
            'nomor_hp' => trim($row[6] ?? '') ?: null,
            'tanggal_lahir' => trim($row[7] ?? '') ?: null,
            'jenis_kelamin' => trim($row[8] ?? '') ?: null,
            'id_kartu_identitas' => intval($row[9] ?? 0) ?: null,
            'id_regencies' => intval($row[10] ?? 0) ?: null,
        ];

        if ($data['username'] && $data['email'] && $data['password']) {
            $userModel->create($data);
        }
    }

}
