<?php
session_start();
$isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'] == true;
$isOnline = isset($_SESSION['online']) && $_SESSION['online'] == true;
?>

<?php

if (isset($_POST['sbtn2']) && $_POST['sbtn2'] == "Return To Home Page") {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyBuy</title>
    <link rel="stylesheet" href="../css/1style.css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<header>
    <div class="left">
        <div class="logo">
            <h2>EasyBuy</h2>
            <h4>supermarket</h4>
        </div>
        <img src="../svgs/bars-solid1.svg" alt="Mobile Menu Icon" style="width: 30px;" class="burgermenu">
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
    <div class="middle">
        <form action="search.php" method="post"> 
            <input type="text" name="search" placeholder="search">
            <button type="submit" id="sbtn2" name="sbtn2" value="Search"> 
                <img src="../svgs/magnifying-glass-solid.svg" alt="Search Icon" style="width: 20px;">
            </button>
            <input type="submit" name='sbtn2' value="Return To Home Page">
        </form>
    </div>
    <div class="right">
        <a>Welcome <?php echo htmlspecialchars($isOnline ? $_SESSION['online'] : ($isAdmin ? $_SESSION['admin'] : '')); ?>!</a>
        <img class="u" src="../svgs/user-solid.svg" style="width: 20px;">
        <a href="viewcart.php"><img class="shop" src="../svgs/cart-shopping.svg" style="width: 22px;"></a>
        <a id="counter"><?php include 'counter.php'; ?></a>
    </div>
</header>

<body>
    <main>
        <div class="container1">
            <?php
            try {
                require('config.php');

                if (isset($_POST['sbtn2']) && $_POST['sbtn2'] == "Search" && !empty($_POST['search'])) {
                    $searchQuery = $_POST['search'];
                    $sql = "SELECT id, name, price, qty, pic FROM products WHERE name LIKE :search";
                    $stmt = $db->prepare($sql);
                    $stmt->bindValue(':search', '%' . $searchQuery . '%', PDO::PARAM_STR);
                    $stmt->execute();
                } else {
                    $sql = "SELECT id, name, price, qty, pic FROM products";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                }
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='box'>";
                        echo "<div class='item'>";
                        echo "<img class='pic' src='../" . htmlspecialchars($row['pic']) . "' style='max-width: 150px; min-width: 150px;'>";
                        echo "<a id='info'>" . htmlspecialchars($row['name']) . "</a><br />";
                        echo "<a id='info'>Price: " . htmlspecialchars($row['price']) . " BHD</a>";
                        if ($row['qty'] == 0) {
                            echo "<h3 style='color:red'>Out of Stock</h3>";
                        } else {
                            echo "<form method='post' action='addtocart.php'>";
                            echo "<div class='box2'>";
                            echo "<button class='cartbtn' id='cartbtn' type='submit'><img class='plus' src='../svgs/plus-solid.svg' width='12'>Add</button>";
                            echo "<a id='sqty'><select name='qty'>";
                            for ($i = 1; $i <= $row['qty']; ++$i) {
                                echo "<option>$i</option>\n";
                            }
                            echo "</select></a><br />";
                            echo "<input type='hidden' name='pid' value='" . htmlspecialchars($row['id']) . "' />";
                            echo "</div>";
                            echo "</form>";
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='container1'>";
                    echo "Item is not available or does not exist";
                    echo "</div>";
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            ?>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="../js/jquery-nav.js"></script>
    <script src="../js/script5.js"></script>
</body>

</html>
