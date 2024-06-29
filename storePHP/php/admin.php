<?php
session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
    
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
            <button type="submit" id= "sbtn2" name="sbtn2" value=""><img src="../svgs/magnifying-glass-solid.svg" alt="Search Icon" style="width: 20px;"></button></i>
        </form>
       </div>
       <div class="right">
        <a>Welcome    <?php echo isset($_SESSION['online']) ? $_SESSION['online'] : (isset($_SESSION['admin']) ? $_SESSION['admin'] : ''); ?>!</a><img class="u" src="../svgs/user-solid.svg" style="width: 20px;">
       <img class="shop" src="../svgs\cart-shopping.svg"  style="width: 22px;">
        </div>
    </header>
<body>
<div class="catagory"><div class="opt">
    <button id="i" onclick="showall()">All Departments</button>
    <button id="i" onclick="showfood()">food</button>
    <button id="i" onclick="showelec()">electronics</button>
    <button id="i" onclick="showadmin()">admin page</button>
</div>
</div>
<div class="container1"> 
        <div class="all" id="all"><?php include 'product.php'?></div>
      <div class="electronics" id="electronics"><?php include 'product1e.php'?></div>
        <div class="food" id="food"><?php include 'product1f.php'?></div>
      
        <div class="admin" id="admin">
              <p>Admin managing page<p>
                     <div class="dashboard">
                   <button id="ad" onclick="createStaff()">Create Staff member</button> 
              <button id="ad" onclick="deleteStaff()">Delete Staff member </button>
            </div>
              

              
          
            <div class="createStaff" id="Cstaff">
   <form method="post" action="admin-folder/Cstaff.php">
    <label for="n">Username: </label>
    <input type="text" name="un" id="un" placeholder="Enter your Username" onkeyup="checkusername(this.value)"> <br />
    <label for="n">Email: </label>
    <input type="text" name="e" id="e" placeholder="Enter your email"> <br />
    <label for="n">Password: </label>
    <input type="password" name="pass" id="pass" placeholder="Enter Password"> <br />
    <label for="n">Confirm Password: </label>
    <input type="password" name="rpass" id="rpass" placeholder="Re-enter your Password"> <br />
    <button type="submit" name="cstaff" class="newstaff" >Create staff</button>
   </form>
            </div>
            <div class="deleteStaff" id="Dstaff">
            <form method="post" action="admin-folder/Dstaff.php">
    <label for="n">Username: </label>
    <input type="text" name="un" id="un" placeholder="Enter your Username" onkeyup="checkusername(this.value)"> <br />
    <label for="n">Password: </label>
    <input type="password" name="pass" id="pass" placeholder="Enter Password"> <br />
    <label for="n">Confirm Password: </label>
    <input type="password" name="rpass" id="rpass" placeholder="Re-enter your Password"> <br />
    <button type="submit" name="cstaff" class="newstaff" >Delete staff</button>
   </form>
            </div>
            <a href="admin-folder/inv.php" id="ada" onclick="inv()">Manage inventory</a>
            </div>
         
        </div>
        
   <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
    <script src="../js/jquery-nav.js"></script>
    <script src="../js/script5.js"></script>
</body>
</html>

