<?php
class App {
    protected $controller = 'HomeController'; // Default controller
    protected $method = 'index';              // Default method
    protected $params = [];                   // Parameter dari URL

    public function __construct() {
        $url = $this->parseURL();

        // Cek apakah controller sesuai file yang ada
        if (isset($url[0]) && preg_match('/^[a-zA-Z0-9]+$/', $url[0]) && file_exists("../app/controllers/{$url[0]}.php")) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        
        if (!file_exists("../app/controllers/{$this->controller}.php")) {
            http_response_code(404);
            require_once '../app/views/errors/404.php';
            exit;
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
