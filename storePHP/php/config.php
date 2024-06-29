<?php
$db = new PDO ( 
'mysql:host=localhost;dbname=easy_buy;charset=utf8',
'root', 
''
);
$db->setAttribute
(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>