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
        
<i>Contact Us - EasyBuy Supermarket<i>

<p>Thank you for choosing EasyBuy Supermarket. We value your feedback and are committed to providing you with excellent customer service.</p> 
<p>Whether you have questions, concerns, or feedback, our team is here to assist you. Here's how you can get in touch with us:</p>
    <i>Customer Support:</i>
    <i>Email: info@easybuysupermarket.com</i>
    <nobr><i>Phone: +123-456-7890</i> <i>Hours: Monday to Friday, 9:00 AM to 5:00 PM</i> <i>Headquarters Address:</i>
      <i>EasyBuy Supermarket</i> <i>123 Main Street</i> <i>City, Country</i><i>Postal Code</i></nobr>
      <i>Social Media:</i>
   <p>Stay connected with us on social media for the latest updates, promotions, and more:</p>
    <i>Facebook</i><i>Twitter</i>  <i>Instagram</i><i>Feedback Form:</i>
   <p>Have something to share with us? Fill out our online feedback form, and our team will get back to you as soon as possible. Your input helps us improve our services and enhance your shopping experience.</p>
<i>Career Opportunities:</i>
<p>Interested in joining the EasyBuy Supermarket team? Visit our Careers page to explore job opportunities and learn more about what it's like to work with us.</p>

<p>Thank you for choosing EasyBuy Supermarket. We look forward to serving you and providing you with the best shopping experience possible.</p>

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
        font-size: 20px;
    }
    p {
        font-size: 18px;
    }
   main i,p {
        display: flex;
        text-align: center;
        flex-direction: column;
        width: 100%;
        margin: 5px;
    }
    </style>
</html>