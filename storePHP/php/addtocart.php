<?php
session_start();
if (!isset($_SESSION['online'])) {
    die("Please login - <a href='login.php'>click here to login</a>");
}
if (isset($_POST['pid'], $_POST['qty'])) {
    $productId = $_POST['pid'];
    $quantity = intval($_POST['qty']);
    try {
        require('config.php');
        $stmt = $db->prepare("SELECT name, price, qty, pic FROM products WHERE id = :pid");
        $stmt->execute(['pid' => $productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($product && $product['qty'] >= $quantity) {
            $db->beginTransaction();
            $insertOrder = $db->prepare("INSERT INTO orders (username, product_id, order_id, price, qty, order_pic, created_at)
                VALUES (:username, :order_id, :product_id, :price, :qty, :order_pic, NOW())");
            $insertOrder->execute([
                'username' => $_SESSION['online'],
                'order_id' => $productId,
                'product_id' => $product['name'],
                'price' => $product['price'],
                'qty' => $quantity,
                'order_pic' => $product['pic'] 
            ]);
            $updateProduct = $db->prepare("UPDATE products SET qty = qty - :qty WHERE id = :pid");
            $updateProduct->execute(['qty' => $quantity, 'pid' => $productId]);
            $db->commit();
            header("Location: index.php");
            exit;
        } else {
            echo "<p>Product not available or insufficient stock.</p>";
        }
    } catch (PDOException $e) {
        $db->rollBack();
        die("Error: " . $e->getMessage());
    }
} else {
    die("Invalid access.");
}
?>
