<?php
class ProvincesController extends Controller {

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $this->model('Provinces')->create($name);
            header('Location: ' . BASE_URL . '/AdminController/Provinces');
        } else {
            $this->view('provinces/create');
        }
    }

    public function edit($id) {
        $model = $this->model('Provinces');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $model->update($id, $name);
            header('Location: ' . BASE_URL . '/AdminController/Provinces');
        } else {
            $data = $model->getById($id);
            $this->view('provinces/edit', ['data' => $data]);
        }
    }

    public function delete($id) {
        $this->model('Provinces')->delete($id);
        header('Location: ' . BASE_URL . '/AdminController/Provinces');
    }
}
