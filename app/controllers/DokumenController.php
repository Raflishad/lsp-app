<?php
require_once '../app/middleware/AuthMiddleware.php';

class DokumenController extends Controller {
    private $user;

    public function __construct() {
        AuthMiddleware::requireRole('siswa');
        $this->user = $_SESSION['user'];
    }

    public function upload() {
        $id_user = $this->user['ID_USER'];

        // Ambil ID_SISWA berdasarkan ID_USER (query langsung atau lewat model)
        $db = new Database();
        $db->query("SELECT ID_SISWA FROM siswa WHERE ID_USER = :id_user");
        $db->bind(':id_user', $id_user);
        $id_siswa = $db->single()['ID_SISWA'];

        // Ambil data identitas
        $jenis = $_POST['jenisIdentitas'];
        $nomor = $_POST['nomorKartu'];

        $uploadDir = '../public/uploads/' . $id_user . '/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $urlIdentitas  = $this->uploadFile('fileIdentitas', $uploadDir, ['pdf', 'jpg', 'jpeg', 'png']);
        $urlFoto       = $this->uploadFile('pasFoto', $uploadDir, ['jpg', 'jpeg', 'png']);
        $urlSertifikat = $this->uploadFile('sertifikat', $uploadDir, ['pdf', 'jpg', 'jpeg', 'png']);
        $urlTranskrip  = $this->uploadFile('transkrip', $uploadDir, ['pdf']);

        if (!str_starts_with($urlIdentitas, 'uploads/')) {
            $_SESSION['error'] = $urlIdentitas;
            header("Location: " . BASE_URL . "/SiswaController/berkas");
            exit;
        }

        $model = $this->model('Dokumen');

        $id_kartu_identitas = $model->simpanIdentitas($jenis, $nomor, $urlIdentitas);
        $model->updateUserIdentitas($id_user, $id_kartu_identitas);
        $ok1 = $id_kartu_identitas ? true : false;
        $ok2 = $model->simpanDokumen($id_siswa, 'pas_foto', $urlFoto);
        $ok3 = $model->simpanDokumen($id_siswa, 'sertifikat', $urlSertifikat);
        $ok4 = $model->simpanDokumen($id_siswa, 'transkrip', $urlTranskrip);

        if ($ok1 && $ok2 && $ok3 && $ok4) {
            $_SESSION['success'] = "Upload berhasil.";
        } else {
            $_SESSION['error'] = "Upload gagal.";
        }

        header("Location: " . BASE_URL . "/SiswaController/berkas");
        exit;
    }

    private function uploadFile($field, $uploadDir, $allowedTypes = [], $maxSizeMB = 2) {
        if (!isset($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) return false;

        $file = $_FILES[$field];
        $sizeMB = $file['size'] / (1024 * 1024);
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if ($sizeMB > $maxSizeMB) return "Ukuran file melebihi {$maxSizeMB}MB";
        if (!in_array($ext, $allowedTypes)) return "Tipe file .$ext tidak diizinkan";

        $newName = uniqid() . '.' . $ext;
        $path = $uploadDir . $newName;
        $url  = 'uploads/' . $_SESSION['user']['ID_USER'] . '/' . $newName;

        if (!move_uploaded_file($file['tmp_name'], $path)) {
            return "Gagal menyimpan file.";
        }

        return $url;
    }

}
