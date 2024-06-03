<?php
class Product {
    private $conn;
    private $table = 'productos';

    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $imagen;
    public $destacado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt;
    }

    public function getDestacados() {
        $query = "SELECT * FROM " . $this->table . " WHERE destacado=1";
        $stmt = $this->conn->query($query);
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (nombre, descripcion, precio, stock, imagen, destacado) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssdisi", $this->nombre, $this->descripcion, $this->precio, $this->stock, $this->imagen, $this->destacado);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET nombre=?, descripcion=?, precio=?, stock=?, imagen=?, destacado=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssdisii", $this->nombre, $this->descripcion, $this->precio, $this->stock, $this->imagen, $this->destacado, $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>