<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<header>
<div class="User-Profile"><?php 
    session_start();
    if(isset($_SESSION['online'])) {
        $username = $_SESSION['online']; 
        echo $username;
    }
    ?></div>
</header>
<body>
    

    <?php 
    if(isset($_SESSION['online'])) {
        try {
            require_once('config.php');
            $username = $_SESSION['online'];
            $stmt = $db->prepare("SELECT * FROM pendings WHERE name = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $pendings = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo '<table border="1">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Order ID</th>';
            echo '<th>Name</th>';
            echo '<th>Date</th>';
            echo '<th>Status</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($pendings as $pending) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($pending['order_id']) . '</td>';
                echo '<td>' . htmlspecialchars($pending['name']) . '</td>';
                echo '<td>' . htmlspecialchars($pending['date']) . '</td>';
                echo '<td>' . htmlspecialchars($pending['status']) . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    } else {
        header("Location: login.php");
        exit();
    }
    ?>
    <a href="index.php">Go back</a>
</body>
</html>
