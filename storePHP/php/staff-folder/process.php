<?php
session_start();
if (!isset($_SESSION['online'])) {
    die("Please login in order to view your cart - <a href='login.php'>click here to login</a> </br> <a href='index.php'>Go back</a>");
}
try {
    require('../config.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sorder'])) {
        $db->beginTransaction();
        $stmt_select_orders = $db->prepare("SELECT * FROM orders WHERE username = :username");
        $stmt_select_orders->execute(['username' => $_SESSION['online']]);
        $orders = $stmt_select_orders->fetchAll(PDO::FETCH_ASSOC);
        foreach ($orders as $order) {
            $stmt_insert_pending = $db->prepare("INSERT INTO pendings (order_id, name, date, status) VALUES (:order_id, :name, :date, 'acknowledged')");
            $stmt_insert_pending->execute([
                'order_id' => $order['order_id'],
                'name' => $_SESSION['online'],
                'date' => $order['created_at']
            ]);
            $stmt_delete_order = $db->prepare("DELETE FROM orders WHERE order_id = :order_id");
            $stmt_delete_order->execute(['order_id' => $order['order_id']]);
        }
        $db->commit();
        header("Location: ../index.php");
        exit();
    }
} catch (PDOException $e) {
    $db->rollBack();
    die("Error: " . $e->getMessage());
}
?>
