<?php
class User {
    private $conn;
    private $table = 'usuarios';

    public $id;
    public $nombre;
    public $email;
    public $password;
    public $role;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (nombre, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $this->nombre, $this->email, $this->password, $this->role);
        return $stmt->execute();
    }

    public function updatePassword() {
        $query = "UPDATE " . $this->table . " SET password=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $this->password, $this->id);
        return $stmt->execute();
    }

    // Otros métodos para editar y eliminar usuarios...
}
?>