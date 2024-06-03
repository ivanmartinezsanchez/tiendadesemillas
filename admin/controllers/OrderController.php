<?php
require_once(__DIR__ . '/../../config/db.php');
require_once(__DIR__ . '/../models/Order.php');

class OrderController {
    private $db;
    private $order;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['usuario']) || $_SESSION['role'] !== 'admin') {
            header("Location: /login.php");
            exit();
        }

        $this->db = (new Database())->getConnection();
        $this->order = new Order($this->db);
    }

    public function index() {
        $result = $this->order->getAll();
        $orders = array();
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        include(__DIR__ . '/../views/orders/index.php');
    }

    // Otros métodos para crear, editar y eliminar pedidos...
}

// Manejar la acción solicitada
if (isset($_GET['action'])) {
    $controller = new OrderController();
    $action = $_GET['action'];
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        echo "Acción no encontrada.";
    }
} else {
    echo "Ninguna acción especificada.";
}
?>