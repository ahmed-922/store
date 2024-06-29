<?php
session_start();

if (!isset($_SESSION['online']) && !isset($_SESSION['admin']) && !isset($_SESSION['staff'])) {
    die ("Please login - <a href='login.php'>click here to login</a>");
}
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid product ID");
}
try {
    require('config.php');
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        die("Product not found");
    }
    $db = null;
} catch (PDOException $e) {
    die($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
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
            <input type="text"name="search" placeholder="search" >
            <input type="submit" name='sbtn' value="Search">
        </form>
       </div>
       <div class="right">
        <a>Welcome    <?php echo isset($_SESSION['online']) ? $_SESSION['online'] : (isset($_SESSION['admin']) ? $_SESSION['admin'] : ''); ?>!</a><a href="user.php"><img class="u" src="../svgs/user-solid.svg" style="width: 20px;"></a>
        <a href="viewcart.php"><img class="shop" src="../svgs\cart-shopping.svg"  style="width: 22px;"></a><a id="counter"><?php include 'counter.php'; ?></a>
        </div>
       
    </header>
<body>
    <div class="box-img">
        <div class="item-img">
            <div class="bimg"><img class="pic-img" src="../<?php echo htmlspecialchars($product['pic']); ?>" style="max-width: 350px; min-width: 350px;"></div>
            <h2><?php echo htmlspecialchars($product['name']); ?></h2>
            <p><strong>Price:</strong> <?php echo htmlspecialchars($product['price']); ?> BHD</p>
            <p><strong>Quantity Available:</strong> <?php echo htmlspecialchars($product['qty']); ?></p>
            <?php if ($product['qty'] == 0) {
                echo "<h3 style='color:red'>Out of Stock</h3>";
            } else {
            ?>
                <form method="post" action="addtocart.php">
                    <div class="box2-img">
                        <button class="cartbtn" id="cartbtn" type="submit"><img class="plus" src="../svgs/plus-solid.svg" width="12">Add to Cart</button>
                        <select name="qty"> 
                            <?php
                            for ($i = 1; $i <= $product['qty']; ++$i) {
                                echo "<option>$i</option>\n";
                            }
                            ?>
                        </select><br />
                        <input type="hidden" name="pid" value="<?php echo $product['id']; ?>" />
                    </div>
                </form>
            <?php } ?>
            <a href="index.php">Go back</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
    <script src="../js/jquery-nav.js"></script>
    <script src="../js/script5.js"></script>
</body>
</html>
