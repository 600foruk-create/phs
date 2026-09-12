<?php
require_once 'db.php';
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

try {
    switch ($method) {
        case 'GET':
            // Fetch all categories
            $stmt = $pdo->query("SELECT * FROM categories ORDER BY name ASC");
            $categories = $stmt->fetchAll();
            echo json_encode(['status' => 'success', 'data' => $categories]);
            break;

        case 'POST':
            // Add a new category
            $name = $_POST['name'] ?? '';
            if (empty($name)) {
                die(json_encode(['status' => 'error', 'message' => 'Category name is required']));
            }
            $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
            $stmt->execute([$name]);
            echo json_encode(['status' => 'success', 'message' => 'Category added successfully', 'id' => $pdo->lastInsertId()]);
            break;

        case 'DELETE':
            // Delete a category (Wait, delete usually requires parsing query params or input for DELETE)
            $input = json_decode(file_get_contents("php://input"), true);
            $id = $input['id'] ?? $_GET['id'] ?? 0;
            if (!$id) {
                die(json_encode(['status' => 'error', 'message' => 'Category ID is required']));
            }
            $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['status' => 'success', 'message' => 'Category deleted successfully']);
            break;

        default:
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
            break;
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
