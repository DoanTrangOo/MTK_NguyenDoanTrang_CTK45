<?php

interface PaymentStrategy {
    public function pay($amount);
    public function getPaymentMethod();
}

class CashPayment implements PaymentStrategy {
    public function pay($amount) {
        // Xử lý thanh toán tiền mặt
        return [
            'success' => true,
            'message' => 'Thanh toán tiền mặt khi nhận hàng',
            'amount' => $amount
        ];
    }

    public function getPaymentMethod() {
        return 'cash';
    }
}

class BankTransferPayment implements PaymentStrategy {
    private $bankAccount;
    private $bankName;

    public function __construct($bankAccount, $bankName) {
        $this->bankAccount = $bankAccount;
        $this->bankName = $bankName;
    }

    public function pay($amount) {
        // Xử lý thanh toán chuyển khoản
        return [
            'success' => true,
            'message' => "Chuyển khoản đến TK: {$this->bankAccount} - Ngân hàng: {$this->bankName}",
            'amount' => $amount,
            'bankAccount' => $this->bankAccount,
            'bankName' => $this->bankName
        ];
    }

    public function getPaymentMethod() {
        return 'bank';
    }
}

class MomoPayment implements PaymentStrategy {
    private $phoneNumber;

    public function __construct($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function pay($amount) {
        // Xử lý thanh toán qua Momo
        return [
            'success' => true,
            'message' => "Thanh toán qua Momo số {$this->phoneNumber}",
            'amount' => $amount,
            'phoneNumber' => $this->phoneNumber
        ];
    }

    public function getPaymentMethod() {
        return 'momo';
    }
}