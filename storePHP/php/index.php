<?php
session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
    header('Location: admin.php');
} 

if(isset($_SESSION['online']) && $_SESSION['online'] == true){
    
} else {
    die("Please login - <a href='login.php'>click here to login</a>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyBuy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Limelight&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/1style.css">
    <link rel="stylesheet" href="../css/header.css">
</head>
 <header>
        <div class="left">
            <div class="logo"><h2>EasyBuy</h2><h4>supermarket</h4></div> 
            <img src="../svgs/bars-solid1.svg" alt="Mobile Menu Icon" style="width: 30px;" class="burgermenu" >
        </div>
       
        <div class="wrapper">
        <div class="mobile-nav">
            <a href="user-folder/about.php" class="navbtn">ABOUT</a>
            <a href="user-folder/shipping.php" class="navbtn">PRICING</a>
            <a href="user-folder/FAQ.php" class="navbtn">FAQ</a>
            <a href="user-folder/contact.php" class="navbtn">CONTACTS</a>
            <a href="logout.php" class="navbtn">Logout</a>
        </div>
</div>      
        </div>
       <div class="middle">
       <form action="search.php" method="post"> 
           <i> <input type="text"name="search" placeholder="search" >
           <button type="submit" id="sbtn2" name="sbtn2" value="Search"><img src="../svgs/magnifying-glass-solid.svg" alt="Search Icon" style="width: 20px;"></button></i>
        </form>
       </div>
       <div class="right">
        <a>Welcome    <?php echo isset($_SESSION['online']) ? $_SESSION['online'] : (isset($_SESSION['admin']) ? $_SESSION['admin'] : ''); ?>!</a><a href="user.php"><img class="u" src="../svgs/user-solid.svg" style="width: 20px;"></a>
        <a href="viewcart.php"><img class="shop" src="../svgs\cart-shopping.svg"  style="width: 22px;"></a><a id="counter"><?php include 'counter.php'; ?></a>
        </div>
       
    </header>
<body>
<div class="catagory"><div class="opt">
    <button id="i" onclick="showall()">All Departments</button>
    <button id="i" onclick="showfood()">food</button>
    <button id="i" onclick="showelec()">electronics</button>
</div>
</div>
<div class="container1"> 
        <div class="all" id="all"><?php include 'product.php'?></div>
      <div class="electronics" id="electronics"><?php include 'product1e.php'?></div>
        <div class="food" id="food"><?php include 'product1f.php'?></div>
</div>
   <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
    <script src="../js/jquery-nav.js"></script>
    <script src="../js/script5.js"></script>
</body>
</html>

