<?php
class WelcomeController extends Controller {

    public function index() {
        // Judul halaman
        $data['title'] = 'Selamat Datang';
        $this->view('welcome/index', $data); // View di views/welcome/index.php
    }
}
