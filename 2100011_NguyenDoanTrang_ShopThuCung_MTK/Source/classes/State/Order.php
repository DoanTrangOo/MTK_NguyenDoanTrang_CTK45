<?php

require_once __DIR__ . '/OrderState.php';

class Order {
    private $state;
    private $orderId;
    private $userId;
    private $totalPrice;
    private $products;
    private $db;

    public function __construct($orderId = null) {
        $this->state = new PendingState();
        $this->db = Database::getInstance();
        
        if ($orderId) {
            $this->loadOrder($orderId);
        }
    }

    private function loadOrder($orderId) {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$orderId]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($order) {
            $this->orderId = $order['id'];
            $this->userId = $order['user_id'];
            $this->totalPrice = $order['total_price'];
            $this->products = $order['total_products'];
            
            // Set state based on status from database
            switch ($order['payment_status']) {
                case 'processing':
                    $this->state = new ProcessingState();
                    break;
                case 'completed':
                    $this->state = new CompletedState();
                    break;
                case 'cancelled':
                    $this->state = new CancelledState();
                    break;
                default:
                    $this->state = new PendingState();
            }
        }
    }

    public function setState(OrderState $state) {
        $this->state = $state;
        if ($this->orderId) {
            $stmt = $this->db->prepare("UPDATE orders SET payment_status = ? WHERE id = ?");
            $stmt->execute([$state->getStatus(), $this->orderId]);
        }
    }

    public function processOrder() {
        return $this->state->processOrder($this);
    }

    public function cancelOrder() {
        return $this->state->cancelOrder($this);
    }

    public function completeOrder() {
        return $this->state->completeOrder($this);
    }

    public function getStatus() {
        return $this->state->getStatus();
    }
}