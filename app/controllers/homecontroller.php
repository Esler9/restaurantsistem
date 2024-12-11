<?php
class homecontroller extends controller {
    public function index() {
        $this->view('home/index', ['mensaje' => '¡Bienvenido al sistema de inventario!']);
    }
}
?>
