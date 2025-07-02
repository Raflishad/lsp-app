<?php

class HomeController extends Controller {
    public function index() {
        $data['title'] = 'LSP SMART2';
        $this->view('home', $data, false); // otomatis akan cari ../app/views/home.php
    }
}
