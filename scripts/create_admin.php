<?php
require_once 'config/db.php';

class Database {
    private $host = "localhost";
    private $db_name = "tienda_semillas";
    private $username = "root"; // Cambia esto si tienes un usuario diferente
    private $password = ""; // Cambia esto si tienes una contraseña
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

$db = (new Database())->getConnection();

$nombre = "Admin";
$email = "admin@example.com";
$password = password_hash("admin123", PASSWORD_DEFAULT);
$role = "admin";

$query = "INSERT INTO usuarios (nombre, email, password, role) VALUES (?, ?, ?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param("ssss", $nombre, $email, $password, $role);

if ($stmt->execute()) {
    echo "Usuario administrador creado exitosamente.";
} else {
    echo "Error al crear el usuario administrador: " . $stmt->error;
}
?>