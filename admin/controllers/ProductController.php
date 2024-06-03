<?php
require_once(__DIR__ . '/../../config/db.php');
require_once(__DIR__ . '/../models/Product.php');

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: /login.php");
            exit();
        }

        $this->db = (new Database())->getConnection();
        $this->product = new Product($this->db);
    }

    public function index() {
        echo "Ejecutando index()"; // Mensaje de depuración
        $result = $this->product->getAll();
        $products = array();
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        include(__DIR__ . '/../views/products/index.php');
    }

    public function create() {
        echo "Ejecutando create()"; // Mensaje de depuración
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->product->nombre = $_POST['nombre'];
            $this->product->descripcion = $_POST['descripcion'];
            $this->product->precio = $_POST['precio'];
            $this->product->stock = $_POST['stock'];
            $this->product->destacado = isset($_POST['destacado']) ? 1 : 0;
            $this->product->imagen = $_FILES['imagen']['name'];

            $target_dir = __DIR__ . '/../../img/';
            $target_file = $target_dir . '/' . basename($this->product->imagen);
            move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);

            if ($this->product->create()) {
                echo "Producto guardado exitosamente";
            } else {
                echo "Error al guardar el producto";
            }
        }
        include(__DIR__ . '/../views/products/create.php');
    }

    public function edit() {
        echo "Ejecutando edit()"; // Mensaje de depuración
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->product->id = $_POST['id'];
            $this->product->nombre = $_POST['nombre'];
            $this->product->descripcion = $_POST['descripcion'];
            $this->product->precio = $_POST['precio'];
            $this->product->stock = $_POST['stock'];
            $this->product->destacado = isset($_POST['destacado']) ? 1 : 0;
            if ($_FILES['imagen']['name']) {
                $this->product->imagen = $_FILES['imagen']['name'];
                $target_dir = __DIR__ . '/../../img/';
                $target_file = $target_dir . '/' . basename($this->product->imagen);
                move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);
            }

            if ($this->product->update()) {
                echo "Producto actualizado exitosamente";
            } else {
                echo "Error al actualizar el producto";
            }
        }
        $id = $_GET['id'];
        $result = $this->product->getById($id);
        $product = $result->fetch_assoc();
        include(__DIR__ . '/../views/products/edit.php');
    }

    public function delete() {
        echo "Ejecutando delete()"; // Mensaje de depuración
        $this->product->id = $_GET['id'];
        if ($this->product->delete()) {
            echo "Producto eliminado exitosamente";
        } else {
            echo "Error al eliminar el producto";
        }
        $this->index();
    }
}

// Manejar la acción solicitada
if (isset($_GET['action'])) {
    $controller = new ProductController();
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