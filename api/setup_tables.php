<?php
require_once 'db.php';

try {
    // Read the schema.sql file from the parent directory
    $sql = file_get_contents('../schema.sql');
    
    if ($sql === false) {
        die("Error: Could not read schema.sql file.");
    }

    // Execute the SQL queries
    // PDO::exec executes an SQL statement in a single function call
    $pdo->exec($sql);
    
    echo "<h1>Success!</h1>";
    echo "<p>Database tables have been created successfully!</p>";
    echo "<p>You can now close this tab and go back to your website to add categories and items.</p>";
    echo "<a href='../index.php'>Go back to Dashboard</a>";
    
} catch (PDOException $e) {
    echo "<h1>Error</h1>";
    echo "<p>Could not create tables: " . $e->getMessage() . "</p>";
}
?>
