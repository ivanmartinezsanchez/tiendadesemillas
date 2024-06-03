<?php
require_once '../config/db.php';
require_once '../models/Payment.php';
require_once '../vendor/autoload.php';

class PaymentController {
    private $db;
    private $payment;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->payment = new Payment($this->db);
    }

    public function pay() {
        session_start();

        if (!isset($_SESSION['usuario'])) {
            header("Location: ../login.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['stripeToken'])) {
            $stripe = new \Stripe\StripeClient('tu_clave_secreta');

            $this->payment->usuario = $_SESSION['usuario'];
            $this->payment->email = $_POST['email'];
            $this->payment->monto = $_POST['amount'];
            $token = $_POST['stripeToken'];

            try {
                $charge = $stripe->charges->create([
                    'amount' => $this->payment->monto * 100,
                    'currency' => 'usd',
                    'description' => 'Compra de semillas',
                    'source' => $token,
                    'receipt_email' => $this->payment->email,
                ]);

                $this->payment->transaccion_id = $charge->id;
                if ($this->payment->create()) {
                    echo "Pago realizado exitosamente. ID de transacción: " . $charge->id;
                } else {
                    echo "Error al guardar la información del pago.";
                }
            } catch (\Stripe\Exception\CardException $e) {
                echo 'Error: ' . $e->getError()->message;
            }
        } else {
            include '../views/payments/pay.php';
        }
    }
}
?>