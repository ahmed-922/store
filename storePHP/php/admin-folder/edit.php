<?php
require_once('../config.php');


if(isset($_GET['id'])) {
    $productId = $_GET['id'];

    
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $productId);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if(!$product) {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Product ID is missing.";
    exit;
}


if(isset($_POST['update'])) {
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $pic = $_POST['pic'];
    $catagory = $_POST['catagory'];
    $qty = $_POST['qty'];

  
    $sql = "UPDATE products SET name = :name, price = :price, pic = :pic, catagory = :catagory, qty = :qty WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':pic', $pic);
    $stmt->bindParam(':catagory', $catagory);
    $stmt->bindParam(':qty', $qty);
    $stmt->bindParam(':id', $productId);
    $stmt->execute();


    header("Location: inv.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>"><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>"><br>

        <label for="pic">Item-Picture:</label>
        <input type="text" id="pic" name="pic" value="<?php echo htmlspecialchars($product['pic']); ?>" placeholder="Enter image URL"> 
        <label for="catagory">Catagory:</label>
        <input type="text" id="catagory" name="catagory" value="<?php echo htmlspecialchars($product['catagory']); ?>"><br>

        <label for="qty">Quantity:</label>
        <input type="number" id="qty" name="qty" value="<?php echo htmlspecialchars($product['qty']); ?>"><br>

        <button type="submit" name="update">Update Product</button>
    </form>
    <a href="inv.php">Go Back</a>
</body>
</html>
