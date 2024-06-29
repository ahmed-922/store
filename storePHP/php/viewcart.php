<?php
session_start();

if (!isset($_SESSION['online'] )) {
    die("Please login in order to view your cart - <a href='login.php'>click here to login</a> </br> <a href='index.php'>Go back</a>");
}

try {
    require('config.php');
    $stmt = $db->prepare("SELECT * FROM orders WHERE username = :username ORDER BY created_at DESC");
    $stmt->execute(['username' => $_SESSION['online']]);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $totalPrice = 0;
    $totalPriceANDdelivery = 0;
    foreach ($orders as $order) {
        $totalPrice += $order['price'] * $order['qty'];
        $totalPriceANDdelivery =  $totalPrice;
        $totalPriceANDdelivery += 2;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link rel="stylesheet" href="../css/1style.css">
    <link rel="stylesheet" href="../css/header.css">
</head>
<header>
        <div class="left">
            <div class="logo"><h2>EasyBuy</h2><h4>supermarket</h4></div> 
            <img src="../svgs/bars-solid1.svg" alt="Mobile Menu Icon" style="width: 30px;" class="burgermenu" >
        </div>
        <nav>
            <a href="#" class="mybtn">ABOUT</a>
            <a href="#" class="mybtn">PRICING</a>
            <a href="#" class="mybtn">CONTACT</a>
        </nav>
        <div class="wrapper">
        <div class="mobile-nav">
            <a href="#" class="navbtn">ABOUT</a>
            <a href="#" class="navbtn">PRICING</a>
            <a href="logout.php" class="navbtn">Logout</a>
        </div>
</div>      
        </div>
       <div class="middle">
       <form action="search.php" method="post"> 
       <i> <input type="text"name="search" placeholder="search" >
            <button type="submit" id= "sbtn" name="sbtn" value=""><img src="../svgs/magnifying-glass-solid.svg" alt="Search Icon" style="width: 20px;"></button></i>
        </form>
       </div>
       <div class="right">
        <a>Welcome    <?php echo isset($_SESSION['online']) ? $_SESSION['online'] : (isset($_SESSION['admin']) ? $_SESSION['admin'] : ''); ?>!</a><a href="user.php"><img class="u" src="../svgs/user-solid.svg" style="width: 20px;"></a>
        <a href="viewcart.php"><img class="shop" src="../svgs\cart-shopping.svg"  style="width: 22px;"></a><a id="counter"><?php include 'counter.php'; ?></a>
        </div>
       
    </header>
<tbody>
    <h1>Your Orders</h1>
    <table border=1>
        <?php foreach ($orders as $order): ?>
<tr>
    <form action="staff-folder/process.php" method="post">
    <tr><td>Product Image</td><td>Product Name</td><td>Price</td><td>quantity</td><td>Added at</td><td>Edit</td></tr>
    <td><img class="pic" src="../<?php echo htmlspecialchars($order['order_pic']); ?>" width="170"></td>
    <td id="orid"><?php echo htmlspecialchars($order['order_id']); ?></td>
    <td><?php echo htmlspecialchars($order['price']); ?> BD</td>
    <td id="orqty"><?php echo htmlspecialchars($order['qty']); ?></td>
    <td id="ordate"><?php echo htmlspecialchars($order['created_at']); ?></td>
    <td><a href="remove.php?pid=<?php echo urlencode($order['product_id']); ?>&qty=<?php echo urlencode($order['qty']); ?>">Remove</a></td>
</tr>
<?php endforeach; ?>

      
    </table> 
    <input type="submit" name="sorder" value="Confirm Your Order">
 </form>
    <p>Total Price: <?php echo $totalPrice; ?> BD</br><br> With Delivery Fee: <?php echo $totalPriceANDdelivery; ?> BD </p>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
    <script src="../js/jquery-nav.js"></script>
    <script src="../js/script5.js"></script>
</tbody>
<a href="index.php"><< Back</a>
</html>
<?php
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

