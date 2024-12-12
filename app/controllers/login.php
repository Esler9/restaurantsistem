<?php
class login extends controller {
    public function login() {
        $this->view('home/login', ['mensaje' => '¡Bienvenido al sistema de inventario!']);
    }
}
?>