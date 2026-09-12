<?php
// api/db.php
// Database connection configuration for Hostinger

$host = 'localhost'; // Usually 'localhost' on Hostinger shared hosting
$dbname = 'u245697138_ths123';
$username = 'u245697138_ths123';
$password = 'Naimat123.@';

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
        'message' => "HOSTINGER ERROR: Access Denied!\n\nYou told me the password is 'Naimat123.@' but Hostinger rejected it.\n\nPlease go to your Hostinger hPanel -> MySQL Databases.\n1. Find user 'u245697138_ths123'.\n2. Change its password to exactly 'Naimat123.@'\n3. Make sure the user is assigned to the database."
    ]));
}
?>
