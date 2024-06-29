<?php
try {
    require('config.php');
 
    if (isset($_GET['q'])) {
        $us = $_GET['q'];
 
        $sql= "SELECT DISTINCT username FROM users WHERE username =:username";
        $stmt=$db->prepare($sql);
        $stmt->bindParam(':username',$us);
        $stmt->execute();
        $count = $stmt->rowCount();
 
        if ($count > 0) {
            echo "taken";
        } else {
            echo "available";
        }
 
        $db = null;
    }
} catch (PDOException $ex) {
    die($ex->getMessage());
}
?>