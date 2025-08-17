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
}
