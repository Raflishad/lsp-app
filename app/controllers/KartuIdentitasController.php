<?php
require_once '../app/middleware/AuthMiddleware.php';
require_once '../app/middleware/CsrfMiddleware.php';

class KartuIdentitasController extends Controller {

    public function __construct() {
        AuthMiddleware::requireRole('admin');
    }

    //  public function create() {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         CsrfMiddleware::verifyRequest();
    //         $jenis = $_POST['jenis'];
    //         $nomor = $_POST['nomor'];

    //         $filePath = null;
    //         if (!empty($_FILES['file']['name'])) {
    //             $allowed = ['pdf','jpg','jpeg','png'];
    //             $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    //             $maxSize = 2 * 1024 * 1024; // 2 MB (dalam byte)

    //             // Cek ekstensi
    //             if (!in_array($ext, $allowed)) {
    //                 die("❌ File tidak valid, hanya PDF/JPG/JPEG/PNG yang diizinkan.");
    //             }

    //             // Cek ukuran
    //             if ($_FILES['file']['size'] > $maxSize) {
    //                 die("❌ Ukuran file maksimal 2 MB.");
    //             }

    //             // Buat folder kalau belum ada
    //             $uploadDir = "uploads/kartu_identitas/";
    //             if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

    //             // Simpan file
    //             $filePath = $uploadDir . time() . "_" . basename($_FILES['file']['name']);
    //             move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
    //         }

    //         $this->model('KartuIdentitas')->create($jenis, $nomor, $filePath);
    //         $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
    //         header("Location: " . BASE_URL . "/AdminController/kartuIdentitas");
    //         exit;
    //     } else {
    //         $this->view('admin/kartuIdentitas/create');
    //     }
    // } 

    public function edit($id) {
        $model = $this->model('KartuIdentitas');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            CsrfMiddleware::verifyRequest();
            $jenis = $_POST['jenis'];
            $nomor = $_POST['nomor'];

            $filePath = null;
            if (!empty($_FILES['file']['name'])) {
                $allowed = ['pdf','jpg','jpeg','png'];
                $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                $maxSize = 2 * 1024 * 1024; // 2 MB (dalam byte)

                // Cek ekstensi
                if (!in_array($ext, $allowed)) {
                    die("❌ File tidak valid, hanya PDF/JPG/JPEG/PNG yang diizinkan.");
                }

                // Cek ukuran
                if ($_FILES['file']['size'] > $maxSize) {
                    die("❌ Ukuran file maksimal 2 MB.");
                }

                // Buat folder kalau belum ada
                $uploadDir = "uploads/kartu_identitas/";
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

                // Simpan file
                $filePath = $uploadDir . time() . "_" . basename($_FILES['file']['name']);
                move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
            }

            $model->update($id, $jenis, $nomor, $filePath);
            $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
            header("Location: " . BASE_URL . "/AdminController/kartuIdentitas");
            exit;
        } else {
            $data = $model->getById($id);
            $this->view('admin/kartuIdentitas/edit', [
                'title' => 'Edit Kartu Identitas',
                'data' => $data]);
        }
    }

    public function delete($id) {
        CsrfMiddleware::verifyRequest();
        $this->model('KartuIdentitas')->delete($id);
        header("Location: " . BASE_URL . "/AdminController/kartuIdentitas");
        exit;
    }
}
