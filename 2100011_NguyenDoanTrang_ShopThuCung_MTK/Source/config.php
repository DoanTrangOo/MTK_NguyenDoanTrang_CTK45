<?php

require_once __DIR__ . '/classes/Database.php';

try {
    // Get the database connection using singleton
    $db = Database::getInstance();
    $conn = $db->getConnection();
} catch (Exception $e) {
    // In production you may want to log the error instead of echoing
    echo $e->getMessage();
    exit;
}

?>