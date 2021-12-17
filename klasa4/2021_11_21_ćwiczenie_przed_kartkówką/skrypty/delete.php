<?php
require_once('connection.php');
$selectsql = "SELECT `imie`, `nazwisko` FROM `studenci` WHERE `id` = $_GET[id_studenta]";
$result = $connection->query($selectsql)->fetch_assoc();
$imie = $result['imie'];
$nazwisko = $result['nazwisko'];
$sql = "DELETE FROM `studenci` WHERE id = $_GET[id_studenta]";
$connection->query($sql);


header ("location: ../bernart.php?studenci=&message=Usunięto studenta $imie $nazwisko");