<?php
class homecontroller extends controller {
    public function index() {
        $this->view('home/index', ['mensaje' => '¡bienvenido al sistema de inventario!']);
    }
}
?>
