<?php
require_once("./connect.php");
echo "<pre>";
print_r($_POST);
echo "</pre>";
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthday']) && isset($_POST['height']))
{
    $sql = "INSERT INTO `pprog_lekcja`.`users`(name, surname, birthday, height) VALUES 
    ('$_POST[name]', '$_POST[surname]', '$_POST[birthday]', '$_POST[height]')";
    if ($connection->query($sql))
    {
        header("location: ../bazy_delete.php?addedUser=$_POST[name] $_POST[surname]");
    }
    else
    {
        echo $connection->error;
    }
}
else
{
}
