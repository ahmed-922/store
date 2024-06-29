<?php
session_start();
require("config.php");
$reg_un = '/[a-zA-Z][a-zA-Z](?=.*[!$?@_-]{0,1})(?=.*[0-9]{0,1})/';
$expr = '/(?=.*[!$?@_-]{1,})(?=.*[0-9]{1,})(?=.*[a-z]{1,})(?=.*[A-Z]{1,})/';
$un_empty = $pass_empty = $un_pass_empty = $unerr = $passerr = $loginerr = '';
try {
    if (isset($_POST['sbtn'])) {
        $username = $_POST["un"];
        $pass = $_POST["pass"];
        if (empty($username) && empty($pass)) {
            $un_pass_empty = "Username and Password are required to login";
        } elseif (empty($username)) {
            $un_empty = "Username is required to login.";
        } elseif (empty($pass)) {
            $pass_empty = "Password is required to login.";
        } else {
            // Check if admin
            if ($username == 'admin' && $pass == "abc123") {
                $_SESSION['admin'] = true;
                $_SESSION['staff'] = false;
                $_SESSION['username'] = $_SESSION['name'] = 'admin';
                header("location: admin.php");
                exit();
            } else {
                if (preg_match($reg_un, $username) && preg_match($expr, $pass)) {
                    // Check if staff
                    $sql = "SELECT * FROM users WHERE (username = :username OR email = :username) AND type = 'staff'";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':username', $username);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($row && password_verify($pass, $row['password'])) {
                        $_SESSION['staff'] = true;
                        $_SESSION['admin'] = false;
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['online'] = $row['username'];
                        header("location: staff.php");
                        exit();
                    } else {
                        // Check if regular user
                        $sql = "SELECT * FROM users WHERE username = :username OR email = :username";
                        $stmt = $db->prepare($sql);
                        $stmt->bindParam(':username', $username);
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        if ($row && password_verify($pass, $row['password'])) {
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['online'] = $row['username'];
                            $_SESSION['admin'] = false;
                            $_SESSION['staff'] = false;

                            header("location:index.php");
                            exit();
                        } else {
                            if (!$row) {
                                $unerr = "Wrong username";
                            } else {
                                $passerr = "Wrong Password";
                            }
                        }
                    }
                } else {
                    $loginerr = "Invalid username or Password format";
                }
            }
        }
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/2style.css">
</head>
<body>
<div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="un">Username: </label>
        <input type="text" name="un" id="un" placeholder="Enter your username"> <br />
        <div class="err"><?php echo $un_empty ?></div></br>
        <label for="pass">Password: </label>
        <input type="password" name="pass" id="pass" placeholder="Enter your password"> <br />
        <div class="err"><?php echo $pass_empty ?></div></br>
        <button type="submit" name="sbtn" class="login">Login</button> <br/>
        <button type="button" class="imnew" onclick="location.href='register.php'">Don't have an account? Sign Up</button>
        </br>
        <div class="err"><?php echo $un_pass_empty ?></div><div class="err"><?php echo $loginerr ?></div><div class="err"><?php echo $unerr ?></div><div class="err"><?php echo $passerr ?></div>
    </form>
</div>
</body>
<footer>Made by: Ahmed Abdulrahman Ali Bahar - 202003847</footer>
</html>
