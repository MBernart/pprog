<?php
require_once("./connect.php");
echo "<pre>";
print_r($_POST);
echo "</pre>";
    foreach ($_POST as $key => $value)
    {
        if (empty($value))
        {
            header("location: ../bazy_delete.php?error=Wypełnij wszystkie pola");
            exit;
        }
    }

    $sql = "INSERT INTO `pprog_lekcja`.`users`(name, surname, birthday, cityid, height) VALUES 
    ('$_POST[name]', '$_POST[surname]', '$_POST[birthday]', '$_POST[cityid]', '$_POST[height]')";
    if ($connection->query($sql))
    {
        header("location: ../bazy_delete.php?addedUser=$_POST[name] $_POST[surname]");
    }
    else
    {
        echo $connection->error;
    }