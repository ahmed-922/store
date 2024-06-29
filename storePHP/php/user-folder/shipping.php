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
    <title>Document</title>
    <link rel="stylesheet" href="../../css/1style.css">
    <link rel="stylesheet" href="../../css/header.css">
</head>
<header>
        <div class="left">
            <div class="logo"><h2>EasyBuy</h2><h4>supermarket</h4></div> 
            <img src="../../svgs/bars-solid1.svg" alt="Mobile Menu Icon" style="width: 30px;" class="burgermenu" >
        </div>
       
        <div class="wrapper">
        <div class="mobile-nav">
            <a href="about.php" class="navbtn">ABOUT</a>
            <a href="shipping.php" class="navbtn">PRICING</a>
            <a href="FAQ.php" class="navbtn">FAQ</a>
            <a href="contact.php" class="navbtn">CONTACTS</a>
            <a href="../logout.php" class="navbtn">Logout</a>
        </div>
</div>      
        </div>
       <div class="middle">
       <form action="search.php" method="post"> 
       <i> <input type="text"name="search" placeholder="search" >
            <button type="submit" id= "sbtn" name="sbtn" value=""><img src="../../svgs/magnifying-glass-solid.svg" alt="Search Icon" style="width: 20px;"></button></i>
        </form>
       </div>
       <div class="right">
        <a>Welcome    <?php echo isset($_SESSION['online']) ? $_SESSION['online'] : (isset($_SESSION['admin']) ? $_SESSION['admin'] : ''); ?>!</a><img class="u" src="../../svgs/user-solid.svg" style="width: 20px;">
        <a href="viewcart.php"><img class="shop" src="../../svgs\cart-shopping.svg"  style="width: 22px;"></a>
        </div>
    </header>
<body>
    <main>
<p>Welcome to EasyBuy Supermarket, your premier destination for all your grocery needs. Founded with a commitment to convenience, quality, and community, EasyBuy is here to redefine your shopping experience.</p>
<i>Our Mission</i>
<p>At EasyBuy Supermarket, our mission is simple: to provide our customers with top-notch products and unparalleled service. We strive to make grocery shopping a hassle-free and enjoyable endeavor for every individual who walks through our doors or visits our online platform.</p>
<i>Quality and Variety</i>
<p>We understand that quality and variety are essential aspects of any grocery shopping experience. That's why we go above and beyond to curate a diverse selection of high-quality products, ranging from fresh produce to pantry staples and everything in between. With EasyBuy, you can trust that each item meets our stringent quality standards.</p>
<i>Convenience</i>
<p>We recognize that our customers lead busy lives, which is why we've made convenience a top priority. With our user-friendly online platform, you can browse, select, and purchase your groceries from the comfort of your home. Plus, our reliable delivery service ensures that your order is promptly delivered to your doorstep, saving you time and effort.</p>
<i>Shipping Information</i>
<p>EasyBuy Supermarket offers convenient shipping options to cater to your needs. Our standard shipping fee is 2 BD, providing you with affordable and efficient delivery service. Whether you're stocking up on essentials or grabbing last-minute items, our shipping process is designed to be seamless and reliable.</p>
<i>Contact Us</i>
<p>Have questions about our shipping process or need assistance with your order? Our dedicated customer service team is here to help. Reach out to us via email at info@easybuysupermarket.com or give us a call at +123-456-7890. We're available Monday through Friday, from 9:00 AM to 5:00 PM, to address any inquiries or concerns you may have.</p>
<p>Thank you for choosing EasyBuy Supermarket for all your grocery needs. We're honored to serve you and look forward to exceeding your expectations with every order.</p>
<i>EasyBuy Supermarket</i>
<a href="../index.php"><< back </a>  
</main>
 
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
    <script src="../../js/jquery-nav.js"></script>
    <script src="../../js/script5.js"></script>
    
</body>
<style>
    main {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        }
   main i {
        font-size: 25px;
    }
    p {
        font-size: 20px;
    }
   main i,p {
        display: flex;
        text-align: center;
        flex-direction: column;
        width: 70%;
        margin: 5px;
    }
    </style>
</html>