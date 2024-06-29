<?php
require_once('../config.php');

if(isset($_POST['cstaff'])) {
    

    $msgempty = $msgun = $msgPass = '';

    if (empty($_POST['un']) || empty($_POST['pass']) || empty($_POST['rpass'])) {
        $msgempty = "Please fill all fields";
    } else {
        $username = $_POST['un'];
        $pass = $_POST['pass'];
        $rpass = $_POST['rpass'];

     
        if ($pass != $rpass || $pass != 'adminDelete') {
            $msgPass = "Incorrect password";
        }

      
        if (empty($msgempty) && empty($msgPass)) {
            try {
                $sql = "SELECT * FROM users WHERE username = :username AND type = 'staff'";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->execute();
                $user = $stmt->fetch();

                if ($user) {
                    $sqlDelete = "DELETE FROM users WHERE username = :username";
                    $stmtDelete = $db->prepare($sqlDelete);
                    $stmtDelete->bindParam(':username', $username);
                    $stmtDelete->execute();

                    header("Location: ../admin.php");
                    exit;
                } else {
                
                    $msgPass = "The selected user is not a staff member";
                }
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
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
    <?php if(isset($msgPass)) echo "<p>$msgPass</p>"; ?>
    <a href="../admin.php">Go back</a>
</body>
</html>
