<?php
class Order {
    private $conn;
    private $table = 'pedidos';

    public $id;
    public $usuario_id;
    public $producto_id;
    public $cantidad;
    public $total;
    public $fecha;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result;
    }

    // Otros métodos para crear, editar y eliminar pedidos...
}
?>