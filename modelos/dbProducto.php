<?php
    require_once "db.php";

    class ProductoCRUD extends Conexion {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function getProductos()
        {
            $sql = "SELECT productos.id, productos.nombre, productos.precio, productos_tipos.descripcion as tipo, marcas.nombre as marca, tipo_id, marca_id FROM productos INNER JOIN productos_tipos ON productos.tipo_id = productos_tipos.id INNER JOIN marcas ON productos.marca_id = marcas.id ORDER BY productos.nombre";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getProducto(int $id) {
            $sql = "SELECT * FROM productos WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result[0];
        }

        public function createProducto(string $nombre, float $precio, int $tipo, int $marca):bool {
            $sql = "INSERT INTO productos (nombre, precio, tipo_id, marca_id) VALUES (:nombre, :precio, :tipo_id, :marca_id)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":precio", $precio, PDO::PARAM_INT);
            $stmt->bindParam(":tipo_id", $tipo, PDO::PARAM_INT);
            $stmt->bindParam(":marca_id", $marca, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public function updateProducto(string $nombre, float $precio, int $tipo, int $marca, int $id): bool {
            $sql = "UPDATE productos SET nombre = :nombre, precio = :precio, tipo_id = :tipo, marca_id = :marca WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":precio", $precio, PDO::PARAM_INT);
            $stmt->bindParam(":tipo", $tipo, PDO::PARAM_INT);
            $stmt->bindParam(":marca", $marca, PDO::PARAM_INT);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public function deleteProducto(int $id) : bool {
            $sql = "DELETE FROM productos WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public function getMarcas() {
            $sql = "SELECT * FROM marcas";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        public function getTipos() {
            $sql = "SELECT * FROM productos_tipos";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
    }
?>