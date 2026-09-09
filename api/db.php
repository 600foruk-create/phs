<?php
// api/db.php
// Database connection configuration for Hostinger

$host = 'localhost'; // Usually 'localhost' on Hostinger shared hosting
$dbname = 'u245697138_ths123';
$username = 'u245697138_ths123';
$password = 'Naimat@.123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Set default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    // In production, you might want to log this instead of outputting directly
    die(json_encode([
        'status' => 'error',
        'message' => 'Database connection failed: ' . $e->getMessage()
    ]));
}
?>
