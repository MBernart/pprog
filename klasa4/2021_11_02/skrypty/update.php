<?php
require_once("connect.php");
$sql =" UPDATE `users` 
SET  
`name` = '$_POST[name]', 
`surname` = '$_POST[surname]', 
`birthday` = '$_POST[birthday]', 
`cityid` = '$_POST[cityid]', 
`height` = '$_POST[height]' 
WHERE 
`users`.`id` = $_POST[id]
";
$connection->query($sql);

header("location: ../bazy_delete.php");
