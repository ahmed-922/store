<?php 
try {
    require('config.php');
    if (isset($_POST['sbtn'])) {
        $reg_1 = '/[!$?@_-]/';
        $reg_2 = '/[0-9]/';
        $reg_3 = '/[a-z]/';
        $reg_4 = '/[A-Z]/';
        $reg_un = '/^[a-zA-Z][a-zA-Z]+$/';
        $msgPass = $msgempty = $msgun = $msgemail = '';
        if (empty($_POST['un']) || empty($_POST['e']) || empty($_POST['pass']) || empty($_POST['rpass'])) {
            $msgempty = "please fill all blanks";
        } else {
            $username = $_POST['un'];
            $email = $_POST['e'];
            $pass = $_POST['pass'];
            $rpass = $_POST['rpass'];
            if (!preg_match($reg_1, $pass)) {
                $msgPass = 'Your password should contain special character (!$?@_-)';
            } elseif (!preg_match($reg_2, $pass)) {
                $msgPass = 'Your password should contain numbers';
            } elseif (!preg_match($reg_3, $pass) || !preg_match($reg_4, $pass)) {
                $msgPass = 'Your password should contain at least 1 uppercase';
            } elseif ($pass != $rpass) {
                $msgPass = 'Passwords do not match';
            } elseif (strlen($pass) < 8) {
                $msgPass = 'Password must contain at least 8 or more characters';
            } else {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                
                if (!preg_match($reg_un, $username)) {
                    $msgun = 'Invalid username format';
                }
                $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $msgemail = 'Email is already taken';
                } else {
                    if (empty($msgPass) && empty($msgempty) && empty($msgun) && empty($msgemail)) {
                        $db->beginTransaction();
                        $hash = password_hash($pass, PASSWORD_DEFAULT);

                        $sql = "INSERT INTO users( username,email,password, type) 
                                VALUES ('$username','$email','$hash', 'user')";
                        $result = $db->exec($sql);
                        $db->commit();
                        header("Location:login.php");
                    }
                }
            }
        }
    }
} catch(PDOException $e) {
    die("Error :" .$e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/2style.css">
</head>
<body> 
    <div class="container">
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="n">Username: </label>
    <input type="text" name="un" id="un" placeholder="Enter your Username" onkeyup="checkusername(this.value)"> <br />
    <span id="msgun" class="error-message"><?php echo isset($msgun) ? $msgun : ''; ?></span> <br/>
    <label for="n">Email: </label>
    <input type="text" name="e" id="e" placeholder="Enter your email" onkeyup="checkemail(this.value)"> <br />
    <span id="msgemail" class="error-message"><?php echo isset($msgemail) ? $msgemail : ''; ?></span> <br/>
    <label for="n">Password: </label>
    <input type="password" name="pass" id="pass" placeholder="Enter Password"> <br />
    <label for="n">Confirm Password: </label>
    <input type="password" name="rpass" id="rpass" placeholder="Re-enter your Password"> <br />
    <span id="msgPass" class="error-message"><?php echo isset($msgPass) ? $msgPass : ''; ?></span> <br>
    <button type="submit" name="sbtn" class="signup" >Sign up!</button><button type="button" class="cancel" onclick="location.href='login.php'">Cancel</button>
    <span id="msgempty" class="error-message"><?php echo isset($msgempty) ? $msgempty : ''; ?></span> <br>
   </form>
   </div>
   <script>
function checkusername(str) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("msgun").innerHTML = this.responseText;
        document.getElementById('msgun').style.color = "gray";
    };
    xhttp.open("GET", "uschecker.php?q=" + str);
    xhttp.send();
}
function checkemail(str) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("msgemail").innerHTML = this.responseText;
        document.getElementById('msgemail').style.color = "gray";
    };
    xhttp.open("GET", "echecker.php?q=" + str);
    xhttp.send();
}
</script>
</body>
<footer>Made by: Ahmed Abdulrahman Ali Bahar - 202003847 </footer>
</html>
