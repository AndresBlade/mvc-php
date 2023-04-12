<?php
    class Conexion {
        private string $dbname = "mvc";
        private string $host = "localhost:3366";
        private string $user = "root";
        private string $password = "";
        
        public PDO $conexion;
        
        public function __construct()
        {
            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;
            try {
                $this->conexion = new PDO($dsn, $this->user, $this->password);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }
    }
?>