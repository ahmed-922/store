<?php
if (isset($_GET['pid'], $_GET['qty'])) {
    $productId = intval($_GET['pid']);
    $quantity = intval($_GET['qty']);
    try {
        require('config.php');
        $stmt = $db->prepare("SELECT name, price, qty, pic FROM products WHERE id = :pid");
        $stmt->execute(['pid' => $productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            try {
                $db->beginTransaction();
                $deleteOrder = $db->prepare("DELETE FROM orders WHERE product_id = :product_id");
                $deleteOrder->bindValue(':product_id', $productId, PDO::PARAM_INT);
                $deleteOrder->execute();
                $updateProduct = $db->prepare("UPDATE products SET qty = qty + :qty WHERE id = :pid");
                $updateProduct->execute(['qty' => $quantity, 'pid' => $productId]);
                $db->commit();
                header("Location: index.php");
                exit;
            } catch (Exception $e) {
                $db->rollBack();
                throw $e;
            }
        } else {
            echo "<p>Error: Product not found.</p>";
        }
    } catch (PDOException $e) {
        $db->rollBack();
        die("Error: " . $e->getMessage());
    }
} else {
    die("Invalid access.");
}
?>
