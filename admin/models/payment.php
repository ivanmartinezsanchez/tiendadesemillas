<?php
class Payment {
    private $conn;
    private $table = 'pagos';

    public $id;
    public $usuario;
    public $email;
    public $monto;
    public $transaccion_id;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (usuario, email, monto, transaccion_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssds", $this->usuario, $this->email, $this->monto, $this->transaccion_id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>