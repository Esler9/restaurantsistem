<?php
class app {
    protected $controller = 'homecontroller'; // Controlador predeterminado
    protected $method = 'index'; // Método predeterminado
    protected $params = []; // Parámetros de la URL

    public function __construct() {
        $url = $this->parseUrl();

        // Verificar si el controlador existe
        if (file_exists('app/controllers/' . $url[0] . 'controller.php')) {
            $this->controller = $url[0] . 'controller';
            unset($url[0]);
        }

        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Verificar si el método existe
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
?>
