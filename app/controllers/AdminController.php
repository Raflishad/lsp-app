<?php

    require_once '../app/middleware/AuthMiddleware.php';

    class AdminController extends Controller {

    public function __construct()
    {
        AuthMiddleware::requireRole('admin');
    
    }

    public function index() {

        $data['title'] = 'Dashboard Admin';
        $this->view('admin/dashboard', $data);
    }
    
    public function provinces() {
        $data['title'] = 'Provinces';
        $data['provinsi'] = $this->model('Provinces')->getAll();
        $this->view('admin/provinces/index', $data);
    }

    public function form() {
        $data['title'] = 'Form';
        $data['forms'] = $this->model('Form')->getAll();
        $this->view('admin/form/index', $data);
    }

    public function level() {
        $data['title'] = 'Level';
        $data['levels'] = $this->model('Level')->getAll();
        $this->view('admin/level/index', $data);
    }

    public function kartuIdentitas() {
        $data['title'] = 'Kartu Identitas';
        $data['kartuIdentitas'] = $this->model('KartuIdentitas')->getAll();
        $this->view('admin/kartuIdentitas/index', $data);
    }

    public function programKeahlian() {
        $data['title'] = 'Program Keahlian';
        $data['programKeahlian'] = $this->model('programKeahlian')->getAll();
        $this->view('admin/programKeahlian/index', $data);
    }

    public function status() {
        $data['title'] = 'Status';
        $data['status'] = $this->model('status')->getAll();
        $this->view('admin/status/index', $data);
    }

    public function regency() {
        $data['title'] = 'Kabupaten';
        $data['regency'] = $this->model('Regency')->getAll();
        $this->view('admin/regency/index', $data);
    }

    public function unit() {
        $data['title'] = 'Unit';
        $data['unit'] = $this->model('unit')->getAll();
        $this->view('admin/unit/index', $data);
    }

    public function skema() {
        $data['title'] = 'Skema';
        $data['skema'] = $this->model('skema')->getAll();
        $this->view('admin/skema/index', $data);
    }
}
