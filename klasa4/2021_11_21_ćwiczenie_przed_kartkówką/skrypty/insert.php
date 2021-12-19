<?php
require_once('connection.php');

$sql = "INSERT INTO `studenci` (`imie`, `nazwisko`, `obywatelstwo_id`) VALUES ('$_POST[imie]', '$_POST[nazwisko]', '$_POST[obywatelstwo_id]')";

$connection->query($sql);
echo $connection->error;

header ("location: ../bernart.php?studenci=&message=Dodano studenta studenta $_POST[imie] $_POST[nazwisko]");