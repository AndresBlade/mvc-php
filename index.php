<?php
    require_once "config/config.php";
    require_once "controladores/controladorProducto.php";

    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        if (!method_exists("controladorProducto", $action)) {
            return;
        }

        controladorProducto::$action();
    } else {
        controladorProducto::index();
    }
?>