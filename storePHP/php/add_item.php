<?php
session_start();
if(isset($_SESSION['staff']) && $_SESSION['staff'] == true){
    try {
        require_once('config.php');
        $img = $_POST['upload'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $catagory = $_POST['catagory'];
        if(isset($img)) {
            $stmt_count = $db->prepare("SELECT COUNT(id) AS total FROM products");
            $stmt_count->execute();
            $result = $stmt_count->fetch(PDO::FETCH_ASSOC);
            $next_id = $result['total'] + 1;
            $stmt = $db->prepare("INSERT INTO products (id, name, price, qty, pic, catagory) VALUES (:id, :name, :price, :quantity, :picture, :catagory)");
            $stmt->bindParam(':id', $next_id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':picture', $img);
            $stmt->bindParam(':catagory', $catagory);
            $stmt->execute();
            header("Location: staff.php");
            exit();
        } else {
            die("Error: File uploaded.");
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: login.php");
    exit();
}
?>
