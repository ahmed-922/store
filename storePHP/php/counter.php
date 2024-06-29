<?php

if (!isset($_SESSION['online']) && !isset($_SESSION['admin'])) {
    die("Please login - <a href='login.php'>click here to login</a>");
}
try {
    require('config.php');
    $stmt = $db->prepare("SELECT COUNT(*) AS order_count FROM orders WHERE username = :username");
    $stmt->execute(['username' => $_SESSION['online']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $orderCount = $result['order_count'];  
    $db = null;
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
echo "<div style=' font-weight: bold; padding: 3px 3px; font-size: 10px; color: black; align-items: center; display:flex; juststify-content: center;align-content: center;'>" . htmlspecialchars($orderCount) . "</div>";
?>
