<?php
require_once('../config.php');

if(isset($_POST['cstaff'])) {
   
    
    $reg_1 = '/[!$?@_-]/';
    $reg_2 = '/[0-9]/';
    $reg_3 = '/[a-z]/';
    $reg_4 = '/[A-Z]/';
    $reg_un = '/^[a-zA-Z][a-zA-Z]+$/';

    $msgPass = $msgempty = $msgun = '';

    if (empty($_POST['un']) || empty($_POST['e']) || empty($_POST['pass']) || empty($_POST['rpass'])) {
        $msgempty = "Please fill all fields";
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
            $msgPass = 'Password must contain at least 8 characters';
        } else {
            
            if (!preg_match($reg_un, $username)) {
                $msgun = 'Invalid username format';
            }
        }

      
        if (empty($msgPass) && empty($msgempty) && empty($msgun)) {
            try {
              
                $sqlCount = "SELECT COUNT(*) FROM users WHERE type='staff'";
                $stmtCount = $db->prepare($sqlCount);
                $stmtCount->execute();
                $count = $stmtCount->fetchColumn();

               
                $staffNum = 'staff-' . ($count + 1);

                
                $sqlInsert = "INSERT INTO users (username, email, password, type) VALUES (:username, :email, :password, 'staff')";
                $stmtInsert = $db->prepare($sqlInsert);
                $stmtInsert->bindParam(':username', $staffNum);
                $stmtInsert->bindParam(':email', $email);
                $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
                $stmtInsert->bindParam(':password', $hashedPassword);
                $stmtInsert->execute();

                
                header("Location: ../admin.php");
                exit;
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        } else {
            $errorMsg = "Error occurred. Please check your input.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <?php if(isset($errorMsg)) echo "<p>$errorMsg</p>"; ?>
    <a href="../admin.php">Go back</a>
</body>
</html>
