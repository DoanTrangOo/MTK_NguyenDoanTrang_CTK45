<?php

interface OrderState {
    public function processOrder($order);
    public function cancelOrder($order);
    public function completeOrder($order);
    public function getStatus();
}

class PendingState implements OrderState {
    public function processOrder($order) {
        $order->setState(new ProcessingState());
        return true;
    }
    
    public function cancelOrder($order) {
        $order->setState(new CancelledState());
        return true;
    }
    
    public function completeOrder($order) {
        // Không thể complete đơn hàng đang pending
        return false;
    }

    public function getStatus() {
        return 'pending';
    }
}

class ProcessingState implements OrderState {
    public function processOrder($order) {
        // Đã trong trạng thái processing
        return false;
    }
    
    public function cancelOrder($order) {
        $order->setState(new CancelledState());
        return true;
    }
    
    public function completeOrder($order) {
        $order->setState(new CompletedState());
        return true;
    }

    public function getStatus() {
        return 'processing';
    }
}

class CompletedState implements OrderState {
    public function processOrder($order) {
        // Không thể process đơn đã hoàn thành
        return false;
    }
    
    public function cancelOrder($order) {
        // Không thể hủy đơn đã hoàn thành
        return false;
    }
    
    public function completeOrder($order) {
        // Đã hoàn thành rồi
        return false;
    }

    public function getStatus() {
        return 'completed';
    }
}

class CancelledState implements OrderState {
    public function processOrder($order) {
        // Không thể process đơn đã hủy
        return false;
    }
    
    public function cancelOrder($order) {
        // Đã hủy rồi
        return false;
    }
    
    public function completeOrder($order) {
        // Không thể complete đơn đã hủy
        return false;
    }

    public function getStatus() {
        return 'cancelled';
    }
}