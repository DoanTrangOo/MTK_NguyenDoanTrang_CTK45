<?php

require_once __DIR__ . '/PaymentStrategy.php';

class Payment {
    private $strategy;

    public function setPaymentMethod($method, $params = []) {
        switch ($method) {
            case 'cash':
                $this->strategy = new CashPayment();
                break;
            case 'bank':
                if (!isset($params['bankAccount']) || !isset($params['bankName'])) {
                    throw new Exception('Bank account and bank name are required for bank transfer');
                }
                $this->strategy = new BankTransferPayment($params['bankAccount'], $params['bankName']);
                break;
            case 'momo':
                if (!isset($params['phoneNumber'])) {
                    throw new Exception('Phone number is required for Momo payment');
                }
                $this->strategy = new MomoPayment($params['phoneNumber']);
                break;
            default:
                throw new Exception('Invalid payment method');
        }
    }

    public function processPayment($amount) {
        if (!$this->strategy) {
            throw new Exception('Payment method not set');
        }
        return $this->strategy->pay($amount);
    }

    public function getPaymentMethod() {
        return $this->strategy ? $this->strategy->getPaymentMethod() : null;
    }
}