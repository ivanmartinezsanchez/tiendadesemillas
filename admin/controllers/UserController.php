<?php
require_once(__DIR__ . '/../../config/db.php');
require_once(__DIR__ . '/../models/User.php');

class UserController {
    private $db;
    private $user;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['usuario']) || $_SESSION['role'] !== 'admin') {
            header("Location: /login.php");
            exit();
        }

        $this->db = (new Database())->getConnection();
        $this->user = new User($this->db);
    }

    public function index() {
        $result = $this->user->getAll();
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        include(__DIR__ . '/../views/users/index.php');
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->user->nombre = $_POST['nombre'];
            $this->user->email = $_POST['email'];
            $this->user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $this->user->role = $_POST['role'];

            if ($this->user->create()) {
                header("Location: /admin/controllers/UserController.php?action=index");
            } else {
                echo "Error al crear el usuario.";
            }
        } else {
            include(__DIR__ . '/../views/users/create.php');
        }
    }

    public function changePassword() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->user->id = $_POST['id'];
            $this->user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if ($this->user->updatePassword()) {
                header("Location: /admin/controllers/UserController.php?action=index");
            } else {
                echo "Error al cambiar la contraseña.";
            }
        } else {
            $id = $_GET['id'];
            include(__DIR__ . '/../views/users/change_password.php');
        }
    }

    // Otros métodos para editar y eliminar usuarios...
}

// Manejar la acción solicitada
if (isset($_GET['action'])) {
    $controller = new UserController();
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