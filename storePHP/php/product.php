<?php

if (!isset($_SESSION['online']) && !isset($_SESSION['admin'])) {
    die ("Please login - <a href='login.php'>click here to login</a>");
}
try {
    require('config.php');
    $sql = "SELECT * FROM products";
    $productsRecords = $db->query($sql);
    $db = null;
} catch (PDOException $e) {
    die($e->getMessage());
}
?>
<?php while ($details = $productsRecords->fetch(PDO::FETCH_ASSOC)) {
    extract($details);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/1style.css">
</head>
<body>
<div class="box">
    <div class="item">
    <a href="details.php?id=<?php echo $id; ?>">View detail</a>
     <img class="pic" src="../<?php echo htmlspecialchars($pic); ?>" style="max-width: 150px; min-width: 150px;">
        <a id="info"><?php echo $name; ?></a> <br />
        <a id="info">Price: <?php echo $price; ?>  BHD</a>
        <?php if ($qty == 0) {
            echo "<h3 style='color:red'>Out of Stock</h3>";
        } else {
        ?>
            <form method="post" action="addtocart.php">
                <div class="box2">
                <button class="cartbtn" id="cartbtn" type="submit"><img class="plus" src="../svgs\plus-solid.svg" width="12">Add</button><a id="sqty"> <select name="qty"> 
                        <?php
                        for ($i = 1; $i <= $qty; ++$i) {
                            echo "<option>$i</option>\n";
                        }
                        ?>
                    </select></a><br />
                <input type="hidden" name="pid" value="<?php echo $id; ?>" />
              </div>
            </form>
        <?php } ?>
    </div></div>
<?php } ?>
</body>
</html>
    

