<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class UserController extends Controller {

    public function __construct() {
        AuthMiddleware::requireRole('admin');
    }

    public function import() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            CsrfMiddleware::verifyRequest();

            if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
                $_SESSION['flash_error'] = 'File tidak valid.';
                header('Location: ' . BASE_URL . '/UserController/import');
                exit;
            }

            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, "r");

            if ($handle !== FALSE) {
                // Lewati baris header
                fgetcsv($handle, 1000, ",");

                $userModel = $this->model('User');
                while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $data = [
                        'username' => trim($row[0] ?? ''),
                        'email' => trim($row[1] ?? ''),
                        'password' => password_hash(trim($row[2] ?? ''), PASSWORD_DEFAULT),
                        'nama' => trim($row[3] ?? ''),
                        'alamat' => trim($row[4] ?? ''),
                        'kode_pos' => trim($row[5] ?? ''),
                        'nomor_hp' => trim($row[6] ?? ''),
                        'tanggal_lahir' => trim($row[7] ?? null),
                        'jenis_kelamin' => trim($row[8] ?? ''),
                        'id_kartu_identitas' => intval($row[9] ?? 0),
                        'id_regencies' => intval($row[10] ?? 0),
                    ];

                    if ($data['username'] && $data['email'] && $row[2]) {
                        $userModel->create($data);
                    }
                }
                fclose($handle);
            }

            $_SESSION['flash_success'] = 'Data user berhasil diimport.';
            header('Location: ' . BASE_URL . '/AdminController/user');
            exit;
        }

        $data['title'] = 'Import User';
        $this->view('admin/user/import', $data);
    }

}
