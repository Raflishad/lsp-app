<?php
class App {
    protected $controller = 'WelcomeController'; // Default controller
    protected $method = 'index';              // Default method
    protected $params = [];                   // Parameter dari URL

    public function __construct() {
        $url = $this->parseURL();

        // Cek apakah controller sesuai file yang ada
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // Load controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Cek method di dalam controller
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Sisanya adalah parameter
        $this->params = $url ? array_values($url) : [];

        // Jalankan controller & method dengan parameter
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Ambil dan pecah URL
    private function parseURL() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return ['HomeController']; // Default jika tidak ada URL
    }
}
