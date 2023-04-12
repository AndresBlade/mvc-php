<?php 
    
    
    require_once("modelos/dbProducto.php");

    class controladorProducto {
        private $db;
        public function __construct()
        {
            $this->db = new ProductoCRUD();
        }

        static function index() : void {
            $db = new ProductoCRUD();
            $productos = $db->getProductos();
            
            require_once "vistas/vistaProducto.php";

        }

        static function rellenarNuevoProducto() : void {
            $db = new ProductoCRUD();
            $marcas = $db->getMarcas();
            $tipos = $db->getTipos();

            require("vistas/vistaRellenarNuevoProducto.php");
        }

        static function guardarNuevoProducto(): void {
            $nombre = $_GET['nombre'];
            $precio = $_GET['precio'];
            $tipo = $_GET['tipo'];
            $marca = $_GET['marca'];

            $db = new ProductoCRUD();
            $db->createProducto($nombre, $precio, $tipo, $marca);
            header("Location: index.php");
        }

        static function rellenarEditadoProducto() : void {
            $db = new ProductoCRUD();
            $marcas = $db->getMarcas();
            $tipos = $db->getTipos();

            $id = $_GET["id"];
            $db = new ProductoCRUD();
            $producto = $db->getProducto($id);
            require_once("vistas/vistaRellenarEditadoProducto.php");
        }

        static function guardarEditadoProducto(): void {
            $nombre = $_GET['nombre'];
            $precio = $_GET['precio'];
            $tipo = $_GET['tipo'];
            $marca = $_GET['marca'];
            $id = $_GET['id'];
            $db = new ProductoCRUD();
            $db->updateProducto($nombre, $precio, $tipo, $marca, $id);

            header("location:index.php");
        }

        static function eliminarProducto(): void {
            $id = $_GET["id"];
            $db = new ProductoCRUD();
            $db->deleteProducto($id);
            header("location:index.php");
        }
    }
?>