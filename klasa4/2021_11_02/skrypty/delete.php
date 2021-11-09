<?php
require_once("./connect.php");

if (!empty($_GET['id']))
{
    echo "OK USUWAŃSKO!!!";
    $id = $_GET['id'];
    $sql = "DELETE FROM `users` WHERE `users`.`id` = $id";
    $connection->query($sql);
    $affectedRows = $connection->affected_rows;
    if ($affectedRows > 0)
    {
        header("location: ../bazy_delete.php?deletedUser=$_GET[id]");
    }
    else
    {
        echo "okn't";
    }
}
else
{
    echo "OKn't USUWAŃSKO!!!";
}
