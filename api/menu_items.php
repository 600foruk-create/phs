<?php
require_once 'db.php';
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

try {
    switch ($method) {
        case 'GET':
            // Fetch all items, with category names
            $stmt = $pdo->query("
                SELECT m.*, c.name as category_name 
                FROM menu_items m 
                LEFT JOIN categories c ON m.category_id = c.id 
                ORDER BY c.name ASC, m.name ASC
            ");
            $items = $stmt->fetchAll();
            echo json_encode(['status' => 'success', 'data' => $items]);
            break;

        case 'POST':
            // Can be Add or Update (since HTML forms with file upload often use POST)
            $action = $_POST['action'] ?? 'add';

            if ($action === 'set_offer') {
                $id = $_POST['id'] ?? 0;
                $offer_price = !empty($_POST['offer_price']) ? $_POST['offer_price'] : null;
                $offer_start = !empty($_POST['offer_start']) ? $_POST['offer_start'] : null;
                $offer_end = !empty($_POST['offer_end']) ? $_POST['offer_end'] : null;

                if (!$id) die(json_encode(['status' => 'error', 'message' => 'Item ID is required']));

                $stmt = $pdo->prepare("UPDATE menu_items SET offer_price = ?, offer_start = ?, offer_end = ? WHERE id = ?");
                $stmt->execute([$offer_price, $offer_start, $offer_end, $id]);
                echo json_encode(['status' => 'success', 'message' => 'Special offer updated successfully']);
                break;
            }

            // Normal Add/Edit
            $id = $_POST['id'] ?? 0;
            $category_id = $_POST['category_id'] ?? 0;
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;
            $short_description = $_POST['short_description'] ?? '';

            if (empty($name) || empty($category_id) || empty($price)) {
                die(json_encode(['status' => 'error', 'message' => 'Name, Category, and Price are required']));
            }

            // Handle File Upload
            $image_url = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../uploads/menu/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                
                $fileExt = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $newFileName = uniqid('menu_') . '.' . $fileExt;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $newFileName)) {
                    $image_url = 'uploads/menu/' . $newFileName;
                }
            }

            if ($action === 'add') {
                $stmt = $pdo->prepare("INSERT INTO menu_items (category_id, name, price, short_description, image_url) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$category_id, $name, $price, $short_description, $image_url]);
                echo json_encode(['status' => 'success', 'message' => 'Item added successfully', 'id' => $pdo->lastInsertId()]);
            } else if ($action === 'edit') {
                if ($image_url) {
                    $stmt = $pdo->prepare("UPDATE menu_items SET category_id = ?, name = ?, price = ?, short_description = ?, image_url = ? WHERE id = ?");
                    $stmt->execute([$category_id, $name, $price, $short_description, $image_url, $id]);
                } else {
                    $stmt = $pdo->prepare("UPDATE menu_items SET category_id = ?, name = ?, price = ?, short_description = ? WHERE id = ?");
                    $stmt->execute([$category_id, $name, $price, $short_description, $id]);
                }
                echo json_encode(['status' => 'success', 'message' => 'Item updated successfully']);
            }
            break;

        case 'DELETE':
            $input = json_decode(file_get_contents("php://input"), true);
            $id = $input['id'] ?? $_GET['id'] ?? 0;
            if (!$id) die(json_encode(['status' => 'error', 'message' => 'Item ID is required']));
            
            $stmt = $pdo->prepare("DELETE FROM menu_items WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['status' => 'success', 'message' => 'Item deleted successfully']);
            break;

        default:
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
            break;
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
