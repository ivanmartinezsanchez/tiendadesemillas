<?php
class Database {
    private $host = "localhost";
    private $db_name = "tienda_semillas";
    private $username = "root"; // Cambiar si usas otras credenciales
    private $password = ""; // Cambiar si usas otra contraseña
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            $this->conn->set_charset("utf8");
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>