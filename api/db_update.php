<?php
require_once 'db.php';

try {
    $pdo->exec("
        ALTER TABLE menu_items 
        ADD COLUMN IF NOT EXISTS short_description VARCHAR(255) DEFAULT NULL AFTER price,
        ADD COLUMN IF NOT EXISTS offer_price DECIMAL(10,2) DEFAULT NULL AFTER image_url,
        ADD COLUMN IF NOT EXISTS offer_start DATETIME DEFAULT NULL AFTER offer_price,
        ADD COLUMN IF NOT EXISTS offer_end DATETIME DEFAULT NULL AFTER offer_start
    ");
    echo "Database updated successfully.\n";
} catch (PDOException $e) {
    echo "Error updating database: " . $e->getMessage() . "\n";
}
?>
