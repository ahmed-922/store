<?php
session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
    
} 

if(isset($_SESSION['online']) && $_SESSION['online'] == true){
    
} else {
    if(isset($_SESSION['staff']) && $_SESSION['staff'] == true){
    
    } 
}
?>
<?php
require_once('../config.php');


$sql = "SELECT * FROM products";
$stmt = $db->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Picture</th>
            <th>Catagory</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <body>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?>  BD</td>
                <td><img src="../../<?php echo htmlspecialchars($product['pic']); ?>" alt="Product Image" style="width: 100px;"></td>
                <td><?php echo htmlspecialchars($product['catagory']); ?></td>
                <td><?php echo htmlspecialchars($product['qty']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $product['id']; ?>">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </body>
    <?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    echo '<a href="../admin.php">Go Back</a>';
} elseif (isset($_SESSION['staff']) && $_SESSION['staff'] === true) {
    echo '<a href="../staff.php">Go Back</a>';
} elseif (isset($_SESSION['online']) && $_SESSION['online'] === true) {
    echo '<a href="../index.php">Go Back</a>';
} else {
    die("Please login - <a href='login.php'>click here to login</a>");
}
?>

</table>
