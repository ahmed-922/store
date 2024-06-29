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
    <i>**FAQ - EasyBuy Supermarket**</i>
<p>Welcome to the FAQ section of EasyBuy Supermarket. Here, we've compiled answers to some of the most commonly asked questions to provide you with the information you need for a seamless shopping experience.</p>
<i>**1. What products does EasyBuy Supermarket offer?**</i>
<p>EasyBuy Supermarket offers a wide range of products, including fresh produce, pantry staples, household essentials, snacks, beverages, and more. Our goal is to provide customers with a diverse selection to meet their everyday needs.</p>
   <i>**2. How can I place an order with EasyBuy Supermarket?**</i>
   <p>Placing an order with EasyBuy Supermarket is easy and convenient. Simply visit our website at www.easybuysupermarket.com, browse our products, add items to your cart, and proceed to checkout. You can also place orders via our mobile app for added convenience.</p>
   <i>**3. What are the shipping options available?**</i>
   <p>EasyBuy Supermarket offers standard shipping for all orders. Our standard shipping fee is 2 BD. We strive to ensure timely delivery of your order to your doorstep, providing you with a hassle-free shopping experience.</p>
   <i>**4. How can I track my order?**</i>
   <p>Once your order has been processed and shipped, you will receive a tracking number via email or SMS. You can use this tracking number to monitor the status of your delivery and receive real-time updates on its progress.</p>
   <i>**5. What payment methods does EasyBuy Supermarket accept?**</i>
   <p>EasyBuy Supermarket accepts a variety of payment methods for your convenience, including credit/debit cards, PayPal, and cash on delivery (COD). Choose the option that best suits your preferences during checkout.</p>
   <i>**6. How can I contact customer support?**</i>
   <p> If you have any questions, concerns, or feedback, our dedicated customer support team is here to assist you. You can reach us via email at info@easybuysupermarket.com or by phone at +123-456-7890. Our support team is available Monday through Friday, from 9:00 AM to 5:00 PM.</p>
   <i>**7. Can I return or exchange items?**</i>
   <p>EasyBuy Supermarket strives for customer satisfaction. If you are not completely satisfied with your purchase, please contact our customer support team within 7 days of receiving your order to initiate a return or exchange. Please refer to our Return Policy for more information.</p>
   <p>Thank you for choosing EasyBuy Supermarket. We hope this FAQ section has provided you with helpful information. If you have any further questions or inquiries, don't hesitate to reach out to us. Happy shopping!</p>
   <i>[EasyBuy Supermarket](https://www.easybuysupermarket.com)</i>
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
        font-size: 24px;
    }
    p {
        font-size: 18px;
    }
   main i,p {
        display: flex;
        text-align: center;
        flex-direction: column;
        width: 80%;
        margin: 5px;
    }
    </style>
</html>