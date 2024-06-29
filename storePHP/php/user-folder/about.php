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
    <title>About</title>
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
<i>About EasyBuy Supermarket</i>

<p>Welcome to EasyBuy Supermarket, your one-stop destination for all your grocery needs. At EasyBuy, we are dedicated to providing our customers with a convenient and enjoyable shopping experience.</p>
<i>Our Mission<i>
<p>Our mission at EasyBuy Supermarket is to offer a wide range of high-quality products at affordable prices, ensuring that every customer can find exactly what they need. We strive to create a welcoming environment where shopping is not just a task, but an enjoyable experience.</p>
<i>Quality and Variety</i>
<p>At EasyBuy, we understand the importance of quality and variety when it comes to groceries. That's why we carefully select each product to ensure it meets our high standards. From fresh produce to pantry staples, our shelves are stocked with a diverse selection of items to cater to every taste and dietary need.</p>
<i>Convenience</i>
<p>We know that our customers lead buy lives, which is why we prioritize convenience in everything we do. With our user-friendly online platform, shopping for groceries has never been easier. Simply browse our extensive collection, add items to your cart, and have them delivered straight to your doorstep.</p>
<i>Community Focus</i>
<i>Contact Us</i>
<p>We value feedback from our customers and are always here to assist you with any inquiries or concerns. Feel free to reach out to us via email at info@easybuysupermarket.com or give us a call at +123-456-7890. Our friendly customer service team is available to help you from Monday to Friday, 9:00 AM to 5:00 PM.
Thank you for choosing EasyBuy Supermarket. We look forward to serving you!</p>
<i>EasyBuy Supermarket</i>

<i>Location:</i>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57368.38459313829!2d50.53950499434358!3d26.01640454540606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e484d5602da4725%3A0xbf673baa7596c6cd!2sUniversity%20of%20Bahrain!5e0!3m2!1sen!2sbh!4v1716418124320!5m2!1sen!2sbh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
        height:100%
        width:100%;
        margin: 5px;
    }
    </style>
</html>
