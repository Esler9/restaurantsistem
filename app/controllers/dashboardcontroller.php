<?php
class dashboardcontroller extends controller {
    public function index() {
        $this->view('dashboard/index', ['mensaje' => '¡Bienvenido al sistema de inventario!']);
    }
}
?>
